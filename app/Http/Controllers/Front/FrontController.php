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


    // public function showCategories() {
    //     // Ambil data dari tabel categories
    //     $categories = Category::all();
    //     // Kirim data ke view
    //     return view('frontend.categories', compact('categories'));
    // }

    public function showCategory($slug)
{
   
    $categories = Category::with('courses')->where('slug', $slug)->firstOrFail();

 // Debugging untuk memastikan $categories bukan null atau kosong
 if ($categories->isEmpty()) {
    return "No categories found."; // atau bisa redirect ke halaman lain
}
    return view('frontend.categories', compact('categories'));
}

}
