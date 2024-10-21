<?php

namespace App\Http\Controllers\Front;

use  App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

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
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('frontend.details', compact('course'));
    }

    // public function details(Course $course) {
        
    //     return view('frontend.details', compact('course'));
    // }
}
