<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    /**
     * Generate certificate for a completed course
     */
    public function generateCertificate(Course $course)
    {
        $user = Auth::user();

        // Periksa apakah sertifikat sudah ada
        $existingCertificate = Certificate::where('course_id', $course->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingCertificate) {
            return redirect()->route('course.show', $course->id)
                ->with('success', 'Sertifikat sudah dibuat sebelumnya.');
        }

        // Buat kode unik untuk sertifikat
        $certificateCode = strtoupper(Str::random(10));

        // Data yang akan dikirim ke PDF
        $data = [
            'user' => $user->name,
            'course' => $course->title,
            'certificate_code' => $certificateCode,
            'date' => now()->format('d F Y')
        ];

        // Generate PDF
        $pdf = Pdf::loadView('certificates.certificate-template', $data);

        // Simpan PDF ke storage
        $fileName = 'certificates/' . $certificateCode . '.pdf';
        Storage::put('public/' . $fileName, $pdf->output());

        // Simpan ke database
        $certificate = Certificate::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'certificate_code' => $certificateCode,
            'certificate_url' => Storage::url($fileName)
        ]);

        return redirect()->route('course.show', $course->id)
            ->with('success', 'Sertifikat berhasil dibuat! Anda bisa mengunduhnya.');
    }

    /**
     * Download the certificate
     */
    public function downloadCertificate(Certificate $certificate)
    {
        return response()->download(storage_path('app/public/' . $certificate->certificate_url));
    }
}

