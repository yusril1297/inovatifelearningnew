<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Class_;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudent = User::where('role',2)->count();
        $categories = Category::count();
        $numOfCourse = Course::count();
        $enrollments = Enrollment::count();
        $users_count = DB::table('users')->count();
        $courses_count = DB::table('courses')->count();
        $enrollments_count = DB::table('enrollments')->count();
        $courses = Course::with(['category','instructor','level'])->get();
        // $numOfOrders = Payment::where('status', 'completed')->count();
        // $totalRevenue = Payment::where('status', 'completed')->sum('amount');
        $totalInstructor = User::where('role', 1)->count();
        $totalUser = User::where('role', '!=', 0)->count();
        $numOfCategories = Category::count();

        $enrollmentsByMonth = DB::table('enrollments')
        ->select(
            DB::raw("DATE_FORMAT(enrollment_date, '%M') as month"),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('month')
        ->orderByRaw("MONTH(STR_TO_DATE(month, '%M'))")
        ->get();


        return view('admin.dashboard', compact('totalStudent', 'categories', 'courses','totalInstructor' ,'numOfCategories',"numOfCourse",'enrollments', 'users_count', 'courses_count', 'enrollments_count', 'enrollmentsByMonth','totalUser'));
}
}

