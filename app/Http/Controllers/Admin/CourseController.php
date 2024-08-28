<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

     public function index()
     {
        if (Auth::user()->role == 0) { // Admin
            $courses = Course::with('instructor', 'category', 'level', 'tags')->get();
            $view = 'admin.courses.index'; // View khusus admin
        } elseif (Auth::user()->role == 1) { // Instructor
            $courses = Course::where('instructor_id', Auth::id())->with('category', 'level', 'tags')->get();
            $view = 'instructor.courses.index'; // View khusus instructor
        } else {
            abort(403); // Role tidak diizinkan
        }
    
        return view($view, compact('courses'));
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role != 0 && Auth::user()->role != 1) {
            abort(403); // Role tidak diizinkan
        }
            $categories = Category::all();
            $levels = Level::all();
            $tags = Tag::all();

            $view = Auth::user()->role == 0 ? 'admin.courses.create' : 'instructor.courses.create';

        return view($view, compact('categories', 'levels', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 0 && Auth::user()->role != 1) {
            abort(403); // Role tidak diizinkan
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'level_id' => 'required|exists:levels,id',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:published,draft',
        ]);

        $course = new Course();
        $course->title = $validated['title'];
        $course->slug = Str::slug($validated['title']);
        $course->description = $validated['description'];
        $course->category_id = $validated['category_id'];
        $course->level_id = $validated['level_id'];
        $course->price = $validated['price'];
        $course->status = $validated['status'];
        $course->instructor_id = Auth::id();
     // Set instructor_id sesuai dengan user yang login

        if ($request->hasFile('thumbnail')) {
            $course->thumbnail = $request->file('thumbnail')->store('thumbnails');
        }

        $course->save();

            return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
                            ->with('success', 'Course berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
      
        $this->authorizeAccess($course);

        $videos = $course->videos;
        $view = Auth::user()->role == 0 ? 'admin.courses.show' : 'instructor.courses.show';
        
        return view($view, compact('course', 'videos'));
    
    }


    public function showUploadVideoForm(Course $course)
    {
        $this->authorizeAccess($course);

        $view = Auth::user()->role == 0 ? 'admin.courses.upload-video' : 'instructor.courses.upload-video';
        return view($view, compact('course'));
    }

    public function uploadVideo(Request $request, Course $course)
    {
        $this->authorizeAccess($course);

        $request->validate([
            'videoType' => 'required|in:url,upload',
            'title' => 'required|string|max:255',
            'url' => 'nullable|required_if:videoType,url|url',
            'video' => 'nullable|required_if:videoType,upload|mimes:mp4,mov,avi|max:20000',
        ]);

        $video = new Video();
        $video->title = $request->title;
        $video->course_id = $course->id;

        if ($request->videoType === 'url') {
            $video->url = $request->url;
        } elseif ($request->hasFile('video')) {
            $filename = time() . '.' . $request->video->extension();
            $request->video->storeAs('public/videos', $filename);
            $video->filename = $filename;
        }

        $video->save();

        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.show' : 'instructor.courses.show', $course->id)
                         ->with('success', 'Video berhasil ditambahkan.');
    }

    public function deleteVideo(Video $video)
    {
        $this->authorizeAccess($video->course);

        if ($video->filename && Storage::exists('public/videos/' . $video->filename)) {
            Storage::delete('public/videos/' . $video->filename);
        }

        $video->delete();

        return redirect()->back()->with('success', 'Video berhasil dihapus.');
    }


    private function authorizeAccess(Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke kursus ini.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403); // Instructor hanya bisa mengedit kursus miliknya
        }

        $categories = Category::all();
        $levels = Level::all();
        $tags = Tag::all();
        $selectedTags = $course->tags->pluck('id')->toArray();
    
        $view = Auth::user()->role == 0 ? 'admin.courses.edit' : 'instructor.courses.edit';
    
        return view($view, compact('course', 'categories', 'levels', 'tags', 'selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403); // Instructor hanya bisa mengupdate kursus miliknya
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:published,draft',
        ]);
    
        $course->title = $validated['title'];
        $course->slug = Str::slug($validated['title']);
        $course->description = $validated['description'];
        $course->category_id = $validated['category_id'];
        $course->level_id = $validated['level_id'];
        $course->price = $validated['price'];
        $course->status = $validated['status'];

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail) {
                Storage::delete($course->thumbnail); // Menghapus thumbnail lama
            }
            $course->thumbnail = $request->file('thumbnail')->store('thumbnails');
        }

        $course->save();

        if (isset($validated['tags'])) {
            $course->tags()->sync($validated['tags']);
        } else {
            $course->tags()->detach();
        }

        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
                         ->with('success', 'Course berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403); // Instructor hanya bisa menghapus kursus miliknya
        }

        $course->delete();

        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
                         ->with('success', 'Course berhasil dihapus.');
    }
}
