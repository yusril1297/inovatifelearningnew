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
use Illuminate\Support\Facades\Auth;






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
    
        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$clientKey = config('services.midtrans.client_key');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    
        // Parameter transaksi
        $transactionDetails = [
            'order_id' => 'ORDER-' . uniqid(),
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
    
        // Redirect ke halaman pembayaran Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    
        return view('frontend.checkout', compact('snapToken', 'course'));
    }

    public function notificationHandler(Request $request)
{
    $payload = $request->getContent();
    $notification = json_decode($payload);
    $transactionStatus = $notification->transaction_status;
    $orderId = $notification->order_id;

    // Temukan pembayaran berdasarkan `order_id`
    $payment = Payment::where('order_id', $orderId)->first();

    if ($payment) {
        switch ($transactionStatus) {
            case 'capture':
            case 'settlement':
                $payment->status = 'completed';
                $payment->payment_date = now();
                $payment->save();

                // Perbarui status Enrollment menjadi aktif
                $payment->enrollment()->update(['status' => 'active']);
                break;

            case 'pending':
                $payment->status = 'pending';
                break;

            case 'deny':
            case 'expire':
                $payment->status = 'expired';
                break;

            case 'cancel':
                $payment->status = 'failed';
                break;
        }

        $payment->save();
    }

    return response()->json(['status' => 'success']);
}

    


}   

