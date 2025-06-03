<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $user = $request->user();

    // Memeriksa peran pengguna yang sedang login
    if ($user->role === 0) {
        // Admin view
        $students = User::where('role', 2)->withCount('enrollments')->get();
        $view = 'admin.students.index';
    } elseif ($user->role === 1) {
        // Instructor view
        $courses = Course::where('instructor_id', $user->id)->pluck('id');
        $students = User::where('role', 2)
            ->whereHas('enrollments', function ($query) use ($courses) {
                $query->whereIn('course_id', $courses);
            })
            ->withCount('enrollments')
            ->get();
        $view = 'instructor.students.index';
    } else {
        abort(403);
    }

    return view($view, compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        
        $isTudentExists = User::where('email', $request->email)->where('role', 2)->exists();
        if ($isTudentExists) {
            return redirect()->back()->with('error', 'Student with this email already exists.');
        }

        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 2, // Set role as student
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = User::findOrFail($id);
        $students->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully!');
    }
}
