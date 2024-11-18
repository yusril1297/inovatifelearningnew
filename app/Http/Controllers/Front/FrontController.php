<?php

namespace App\Http\Controllers\Front;

use  App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\User;
use App\Models\Enrollment;

class FrontController extends Controller
{
    public function index() {

        $courses = Course::published()->with(['category', 'enrollments'])->get();
        return view('frontend.home ', compact('courses')); ;
    }

    public function allCourses() {

        $courses = Course::published()->with(['category', 'enrollments'])->get();
        return view('frontend.allCourses', compact('courses'));
    }


    public function showCategories($slug)
    {
   
        $categories = Category::where('slug', $slug)
        ->with(['courses' => function ($query) {
            $query->where('status', 'published');
        }])
        ->firstOrFail();
        return view('frontend.categories', compact('categories'));
    }

    public function instructorDetails($id, Course $courses){

        
         // Temukan instruktur berdasarkan ID
         $instructor = User::with('courses')->findOrFail($id);

        // Ambil kursus yang dibuat oleh instruktur dan berstatus published
        $courses = Course::where('instructor_id', $instructor->id)
                     ->where('status', 'published')
                     ->with('category') // jika ingin memuat relasi kategori
                     ->get();

        return view('frontend.instructorDetails', compact('instructor', 'courses'));
    }

    public function details($slug)
    {
        $courses = Course::where('slug', $slug)->firstOrFail();
    
        $enrollment = null;
        if (Auth::check()) {
            $user = Auth::user();
            $enrollment = $user->enrollments()
                ->where('course_id', $courses->id)
                ->first();
        }
    
        return view('frontend.details', compact('courses', 'enrollment'));
    }

        public function instructor() {

            $instructors = User::where('role', 1)  // Mengambil role 1 (instruktur)
                        ->orWhere('role', 0) // Menambahkan role 0 (admin)
                        ->get();
            
            return view('frontend.instructor', compact('instructors'));
        }

    public function learning($courses, $video, ) {

       
      // Cek jika pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $course = Course::where('slug', $courses)->firstOrFail();
        $video = $course->videos()->where('id', $video)->firstOrFail();

        // Cek apakah pengguna sudah terdaftar di course
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();

        // Jika course gratis dan pengguna belum terdaftar, enroll otomatis
        if ($course->is_free && !$enrollment) {
            $enrollment = $user->enrollments()->create([
            'course_id' => $course->id,
            'enrollment_date' => now(),
            'status' => 'active',  // Automatically set status to active
            'payment_method' => 'free',
            'payable_amount' => 0,
        ]);
            return redirect()->route('frontend.learning', ['course' => $course->slug, 'video' => $video->id]);
        }

        // Pastikan pengguna memiliki akses
        if (!$course->is_free && (!$enrollment || $enrollment->status !== 'active')) {
        // Redirect ke checkout
            if (!$enrollment) {
                return redirect()->route('frontend.checkout', ['course' => $course->slug]);
            } else {
                return redirect()->route('frontend.checkout', ['enrollmentId' => $enrollment->id]);
        }
    }

            return view('frontend.learning', compact('course', 'video', 'enrollment'));
    
}
}
