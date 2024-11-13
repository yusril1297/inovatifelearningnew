<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StudentDashboardController extends Controller
{
    public function index () {
        $courses = Auth::user()->enrolledCourses()->with('instructor', 'category')->get();

        return view('students.dashboard', compact('courses'));
    }
}
