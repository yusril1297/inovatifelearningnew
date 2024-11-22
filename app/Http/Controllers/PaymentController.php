<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Payment;
use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\User;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;





class PaymentController extends Controller
{

    public function checkout(Request $request, Course $course)
    {

        // Validasi bahwa pengguna belum terdaftar pada course yang sama
        $enrollment = Enrollment::firstOrCreate([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
        ], [
            'status' => 'pending',
            'payable_amount' => $course->price,
        ]);        
        
        
        return view('frontend.checkout', compact('course', 'enrollment'));
    }

    public function getSnapToken(Request $request, Enrollment $enrollment)
    {

       // Pastikan hanya pengguna yang terdaftar dapat memproses pembayaran
    if ($enrollment->user_id !== Auth::id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Generate unique order_id
    $orderId = 'ORDER-' . uniqid();

    // Simpan order_id ke dalam enrollment
    $enrollment->update(['order_id' => $orderId]);

    // Generate unique transaction_id
    $transactionId = 'TRANS-' . uniqid();

    // Simpan data awal transaksi ke tabel payments
    Payment::create([
        'enrollment_id' => $enrollment->id,
        'order_id' => $orderId,
        'transaction_id' => $transactionId,  // Menambahkan transaction_id
        'payment_method' => null, // Akan diisi setelah webhook
        'amount' => $enrollment->payable_amount,
        'status' => 'pending', // Status awal
        'payment_details' => null, // Akan diisi setelah webhook
        'payment_date' => null, // Akan diisi setelah webhook
    ]);

    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
    \Midtrans\Config::$clientKey = config('services.midtrans.client_key');
    \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Detail transaksi
    $transactionDetails = [
        'order_id' => $orderId,
        'gross_amount' => $enrollment->payable_amount,
    ];
    $customerDetails = [
        'first_name' => Auth::user()->name,
        'email' => Auth::user()->email,
    ];
    $transaction = [
        'transaction_details' => $transactionDetails,
        'customer_details' => $customerDetails,
    ];

    // Dapatkan Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);

    return response()->json(['snapToken' => $snapToken]);
    }


    public function handleWebhook(Request $request)
{
    try {
        $payload = $request->all();
        Log::info('Webhook Payload: ', $payload);
        Log::info('Headers: ', $request->headers->all());

        // Validasi payload
        $validated = $request->validate([
            'signature_key' => 'required|string',
            'status_code' => 'required|string',
            'order_id' => 'required|string',
            'gross_amount' => 'required|numeric',
            'transaction_status' => 'required|string',
            'transaction_id' => 'required|string',
            'payment_type' => 'nullable|string',
        ]);
        
        // Hitung expected signature key
        $serverKey = config('services.midtrans.server_key');
        $grossAmount = number_format($validated['gross_amount'], 2, '.', ''); // pastikan dua desimal
        
        // Pastikan status_code dalam bentuk string
        $statusCode = (string)$validated['status_code'];
        
        // Menghitung expected signature key sesuai urutan Midtrans
        $expectedSignatureKey = hash('sha512', $validated['order_id'] . $statusCode . $grossAmount . $serverKey);
        
        // Logging untuk debug
        Log::info("Calculated Signature Key: " . $expectedSignatureKey);
        Log::info("Received Signature Key: " . $validated['signature_key']);
        
        // Cek apakah signature valid
        if ($validated['signature_key'] !== $expectedSignatureKey) {
            Log::error('Invalid Signature Key');
            return response()->json(['message' => 'Invalid Signature Key'], 403);
        }

        // Cari data pembayaran berdasarkan order_id
        $payment = Payment::where('order_id', $validated['order_id'])->first();

        if (!$payment) {
            Log::error("Payment not found for order_id: {$validated['order_id']}");
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Pastikan relasi enrollment benar
        $enrollment = $payment->enrollment;

        if (!$enrollment) {
            Log::error("Enrollment not found for order_id: {$validated['order_id']}");
            return response()->json(['message' => 'Enrollment not found'], 404);
        }

        // Perbarui status enrollment berdasarkan status transaksi
        switch ($validated['transaction_status']) {
            case 'settlement':
                $enrollment->update(['status' => 'active']);
                break;
            case 'pending':
                $enrollment->update(['status' => 'pending']);
                break;
            case 'cancel':
            case 'deny':
            case 'expire':
                $enrollment->update(['status' => 'canceled']);
                break;
        }

        // Simpan atau perbarui detail pembayaran
        Payment::updateOrCreate(
            ['transaction_id' => $validated['transaction_id']],
            [
                'enrollment_id' => $enrollment->id,
                'order_id' => $validated['order_id'],
                'payment_method' => $validated['payment_type'] ?? 'unknown',
                'amount' => $validated['gross_amount'],
                'status' => $validated['transaction_status'],
                'payment_date' => $payload['settlement_time'] ?? now(),
                'payment_details' => json_encode($payload),
            ]
        );
        
        Log::info('Webhook processed successfully for order_id: ' . $validated['order_id']);
        return response()->json(['message' => 'Webhook processed'], 200);
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validation error in handleWebhook: ' . $e->getMessage());
        return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        Log::error('Error in handleWebhook: ' . $e->getMessage());
        return response()->json(['message' => 'Internal server error'], 500);
    }
}

}   

