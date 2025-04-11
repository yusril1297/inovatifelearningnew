<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data instruktur dengan menghitung jumlah kursus yang mereka buat
        $instructors = User::where('role', 1)
        ->withCount('courses') // Asumsikan relasi bernama 'courses' ada di model User
        ->get();
        return view('admin.instructors.index', compact('instructors'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'role' => 1, // role 1 untuk instructor
        //     'password' => bcrypt($request->password),
        // ]);

        // return redirect()->route('admin.instructors.index')->with('success', 'Instructor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
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
    public function destroy(string $id )
    {
        $id = User::findOrFail($id);
        $id->delete();
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
