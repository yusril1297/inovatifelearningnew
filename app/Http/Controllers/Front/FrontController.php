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

        $courses = Course::with(['category', 'enrollments'])->get();
        return view('frontend.home ', compact('courses')); ;
    }

    public function allCourses() {

        $courses = Course::with(['category', 'enrollments'])->get();
        return view('frontend.allCourses', compact('courses'));
    }


    public function showCategories($slug)
    {
   
        $categories = Category::with('courses')->where('slug', $slug)->firstOrFail();
        return view('frontend.categories', compact('categories'));
    }

    public function details($slug) {
        $courses = Course::where('slug', $slug)->firstOrFail();
        return view('frontend.details', compact('courses'));
    }

    public function learning($courses, $video, ) {

       
        // Ambil course berdasarkan slug
    $course = Course::where('slug', $courses)->firstOrFail();
    // Ambil video berdasarkan ID
    $video = $course->videos()->where('id', $video)->firstOrFail();

    // Periksa apakah user sudah login
    $user = Auth::user();

    if ($user) {
        // Periksa apakah course gratis atau berbayar
        if ($course->is_free) {
            // Jika gratis, enroll user secara otomatis
            $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
            if (!$enrollment) {
                $user->enrollments()->create([
                    'course_id' => $course->id,
                    'status' => 'active', // Set status menjadi aktif
                ]);
            }
        } else {
            // Jika berbayar, periksa apakah user sudah terdaftar
            $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
            if (!$enrollment) {
                // Redirect ke halaman pembayaran atau informasi untuk mendaftar
                return redirect()->route('frontend.checkout', ['course' => $course->slug]);
            }
        }

        return view('frontend.learning', compact('course', 'video'));
    } else {
        // Jika belum login, redirect ke halaman login
        return redirect('/login');
    }


    }

    
}
