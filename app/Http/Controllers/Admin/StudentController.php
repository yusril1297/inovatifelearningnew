<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('role', 2)
        ->withCount('courses')
        ->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $students = User::findOrFail($id);

        return view('admin.students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $students = User::findOrFail($id);
        $students->update($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
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
