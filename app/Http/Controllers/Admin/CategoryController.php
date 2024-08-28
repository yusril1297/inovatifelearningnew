<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menghandle upload foto icon
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('categories', $filename, 'public');
        } else {
            $path = null;
        }

        // Membuat kategori baru
        $category = new Category;
        $category->name = $validatedData['nama'];
      
        $category->icon = $path;
        $category->save();

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $category = Category::findBySlug($slug)->firstOrFail();
        $courses = $category->courses; // Dapatkan semua kursus dalam kategori ini

        return view('admin.categories.index', compact('category', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
     
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
       // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Menghandle upload icon baru jika ada
    if ($request->hasFile('icon')) {
        // Hapus icon lama jika ada
        if ($category->icon && Storage::disk('public')->exists($category->icon)) {
            Storage::disk('public')->delete($category->icon);
        }

        $file = $request->file('icon');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('categories', $filename, 'public');
    } else {
        $path = $category->icon; // Tetap gunakan icon lama jika tidak ada yang baru
    }

    // Update kategori
    $category->name = $validatedData['nama'];
   
    $category->icon = $path;
    $category->save();

    // Redirect ke halaman daftar kategori dengan pesan sukses
    return redirect()->route('admin.categories.index')
                     ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
            // Hapus icon dari storage jika ada
    if ($category->icon && Storage::disk('public')->exists($category->icon)) {
        Storage::disk('public')->delete($category->icon);
    }

    // Hapus kategori dari database
    $category->delete();

    // Redirect ke halaman daftar kategori dengan pesan sukses
    return redirect()->route('admin.categories.index')
                     ->with('success', 'Category deleted successfully.');

    }

}
