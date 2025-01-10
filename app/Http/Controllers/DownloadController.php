<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Model untuk kursus, sesuaikan dengan nama model Anda
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    // Fungsi untuk mengunduh file
    public function download($slug, $pdf)
    {
        // Temukan kursus berdasarkan slug
        $course = Course::where('slug', $slug)->firstOrFail();
        
        // Tentukan path file PDF yang akan diunduh
        $filePath = 'courses/' . $course->id . '/pdfs/' . $pdf;  // Sesuaikan dengan path penyimpanan file Anda

        // Periksa apakah file ada
        if (Storage::exists($filePath)) {
            // Mengirim file untuk diunduh
            return Storage::download($filePath);
        } else {
            // Jika file tidak ditemukan, tampilkan pesan error
            return abort(404, 'File not found.');
        }
    }
}
