<?php

namespace App\Http\Controllers\Front;

use  App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    public function index()
    {

        $courses = Course::published()->with(['category', 'enrollments'])->get();
        $settings = setting::first();

        $instructors = User::where('role', 1)  // Mengambil role 1 (instruktur)
        ->orWhere('role', 0) // Menambahkan role 0 (admin)
        ->get();


        return view('frontend.home ', compact('courses', 'settings', 'instructors'));;
        
    }

    public function allCourses()
    {
        $search = request()->query('search');
        $price = request()->query('price') * 100000;
        $categories = request()->query('categories',[]);
        $level = request()->query('level');
        

        // dd($categories);

        $courses = Course::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->when($price, function ($query, $price) {
            return $query->where('price', '=', $price);
        })->when($categories, function ($query, $categories) {
            return $query->whereIn('category_id', $categories);
        })->when($level, function ($query, $level) {
            return $query->where('level_id', $level);
        })
        ->where('status', 'published')
        ->has('videos')
        ->get();

        $settings = setting::first();
        $enrollments = Enrollment::where('user_id', Auth::id())
                ->where('status', 'active')
                ->where('exp_time', '>', now())
                ->get();
        $categories = Category::all();
        $levels = Level::all();

        // return $enrollments;

        return view('frontend.allCourses', compact('courses', 'settings', 'enrollments','categories','levels'));
    }


    public function showCategories($slug)
    {
        $settings = setting::first();
        $categories = Category::where('slug', $slug)
            ->with(['courses' => function ($query) {
                $query->where('status', 'published');
            }])
            ->firstOrFail();
        return view('frontend.categories', compact('categories', 'settings'));
    }

    public function instructorDetails($id, Course $courses)
    {

        $settings = setting::first();
        // Temukan instruktur berdasarkan ID
        $instructor = User::with('courses')->findOrFail($id);

        // Ambil kursus yang dibuat oleh instruktur dan berstatus published
        $courses = Course::where('instructor_id', $instructor->id)
            ->where('status', 'published')
            ->with('category') // jika ingin memuat relasi kategori
            ->get();

        return view('frontend.instructorDetails', compact('instructor', 'courses', 'settings'));
    }

    public function details($slug)
    {
        $courses = Course::where('slug', $slug)->firstOrFail();
        // dd($courses->slug);
        $settings = setting::first();
        $enrollment = null;
        if (Auth::check()) {
            $user = Auth::user();
            $enrollment = $user->enrollments()
                ->where('course_id', $courses->id)
                ->where('status', 'active')
                ->where('exp_time', '>', now())
                ->first();
        }
        return view('frontend.details', compact('courses', 'enrollment', 'settings'));
    }

    public function instructor()
    {
        $settings = setting::first();
        $instructors = User::where('role', 1)  // Mengambil role 1 (instruktur)
            ->orWhere('role', 0) // Menambahkan role 0 (admin)
            ->get();

        return view('frontend.instructor', compact('instructors', 'settings'));
    }
    public function about()
    {
        $settings = setting::first(); // Mengambil pengaturan situs jika diperlukan
        return view('frontend.about', compact('settings'));
    }

    public function learning($courses, $video)
    {
        $settings = setting::first();

        // return $settings;

        // Cek jika pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $course = Course::where('slug', $courses)->firstOrFail();
        $video = $course->videos()->where('id', $video)->firstOrFail();

        // Cek apakah pengguna sudah terdaftar di course
        $enrollment = $user->enrollments()->where('course_id', $course->id)     
        ->where('status', 'active')
        ->first();

        // Jika course gratis dan pengguna belum terdaftar, enroll otomatis
        if ($course->is_free && !$enrollment) {
            $enrollment = $user->enrollments()->create([
                'course_id' => $course->id,
                'enrollment_date' => now(),
                'status' => 'active',  // Automatically set status to active
                'payment_method' => 'free',
                'payable_amount' => 0,
            ]);
            return redirect()->route('frontend.learning', ['courses' => $course->slug, 'video' => $video->id]);
        }

        // Pastikan pengguna memiliki akses
        if (!$course->is_free && (!$enrollment  || $enrollment->exp_time < now())) {
            // Redirect ke checkout
            if (!$enrollment) {
                return redirect()->route('frontend.checkout', ['course' => $course->slug]);
            } else {
                // dd($enrollment);
                return redirect()->route('frontend.checkout', ['course' => $course->slug, 'enrollmentId' => $enrollment->id]);
            }
        }



        return view('frontend.learning', compact('course', 'video', 'enrollment', 'settings'));
    }
}
