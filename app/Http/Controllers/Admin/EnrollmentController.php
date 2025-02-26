<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua enrollments dengan relasi ke user dan course
        $enrollments = Enrollment::with(['user', 'course'])->get();

        // Kirim data ke view
        return view('admin.enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua siswa yang tersedia
        $students = User::where('role', '2')->get();

        // Ambil semua kursus yang tersedia
        $courses = Course::all();

        return view('admin.enrollments.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Ambil data kursus berdasarkan ID yang dipilih
        $course = Course::findOrFail($request->course_id);

        // Cek apakah jumlah pertemuan sudah mencapai batas
        if ($course->meeting_limit !== null && $course->meetings()->count() >= $course->meeting_limit) {
            return redirect()->back()->with('error', 'Enrollment is closed because the course has reached its meeting limit.');
        }

        // Cek apakah siswa sudah terdaftar di kursus tersebut
        $existingEnrollment = Enrollment::where('course_id', $request->course_id)
                                        ->where('user_id', $request->user_id)
                                        ->first();
        if ($existingEnrollment) {
            return redirect()->back()->with('error', 'Student is already enrolled in this course.');
        }

        // Simpan pendaftaran siswa
        Enrollment::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'enrollment_date' => now(),
            'status' => 'active',
        ]);

        return redirect()->route('admin.enrollments.index')->with('success', 'Student has been successfully enrolled in the course.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enrollment = Enrollment::with('user', 'course')->findOrFail($id);
        return view('admin.enrollments.show', compact('enrollment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();
    
        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
