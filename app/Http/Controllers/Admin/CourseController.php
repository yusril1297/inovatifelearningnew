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
            // Ambil semua kursus dengan relasi instructor, category, level, dan tags
            $courses = Course::with('instructor', 'category', 'level', 'tags')
            ->withCount('enrollments')
            ->get();
            $view = 'admin.courses.index'; // Gunakan view untuk Admin
        } elseif (Auth::user()->role == 1) { // Instructor
            // Ambil kursus yang hanya dibuat oleh instructor yang sedang login
            $courses = Course::where('instructor_id', Auth::id())
            ->withCount('enrollments')
            ->with('category', 'level', 'tags')->get();
            $view = 'instructor.courses.index'; // Gunakan view untuk Instructor
        } else {
            abort(403); // Role tidak diizinkan
        }

        return view($view, compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk membuat kursus baru
     */
    public function create()
    {
        if (Auth::user()->role != 0 && Auth::user()->role != 1) {
            abort(403); // Role tidak diizinkan
        }

        // Ambil semua kategori, level, dan tags untuk ditampilkan di form
        $categories = Category::all();
        $levels = Level::all();
        $tags = Tag::all();

        $view = Auth::user()->role == 0 ? 'admin.courses.create' : 'instructor.courses.create';

        return view($view, compact('categories', 'levels', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan kursus baru ke database
     */
    public function store(Request $request)
    {
        // Validasi inputan berdasarkan role
        if (Auth::user()->role != 0 && Auth::user()->role != 1) {
            abort(403); // Role tidak diizinkan
        }

        // Validasi data input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'youtube_thumbnail_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:published,draft',
        ]);

        // Buat objek Course baru dan set data dari input
        $course = new Course();
        $course->title = $validated['title'];
        $course->slug = Str::slug($validated['title']);
        $course->description = $validated['description'];
        $course->category_id = $validated['category_id'];
        $course->level_id = $validated['level_id'];
        $course->price = $validated['price'];
        $course->status = $validated['status'];
        $course->instructor_id = Auth::id(); // Set instructor_id sesuai dengan user yang login

        // Mengambil ID video dari URL YouTube
        if (!empty($validated['youtube_thumbnail_url'])) {
            $youtubeUrl = $validated['youtube_thumbnail_url'];
            parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $queryParams);     

            if (isset($queryParams['v'])) {
                // ID video dari URL `https://www.youtube.com/watch?v=VIDEO_ID`
                $course->youtube_thumbnail_url = $queryParams['v'];
            } else {
                // ID video dari URL `https://youtu.be/VIDEO_ID`
                $course->youtube_thumbnail_url = basename(parse_url($youtubeUrl, PHP_URL_PATH));
            }
        }

        // Simpan course ke database
        $course->save();

        // Redirect ke halaman index course sesuai role dengan pesan sukses
        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
                         ->with('success', 'Course berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     * Menampilkan detail kursus berdasarkan role user
     */
    public function show(Course $course)
    {
        $this->authorizeAccess($course);

        // Ambil semua video yang terkait dengan course ini
        $videos = $course->videos;
        $view = Auth::user()->role == 0 ? 'admin.courses.show' : 'instructor.courses.show';

        return view($view, compact('course', 'videos'));
    }

    /**
     * Show the form for uploading a video.
     * Menampilkan form untuk upload video ke kursus
     */
    public function showUploadVideoForm(Course $course)
    {
        $this->authorizeAccess($course);

        $view = Auth::user()->role == 0 ? 'admin.courses.upload-video' : 'instructor.courses.upload-video';
        return view($view, compact('course'));
    }

    /**
     * Upload a video to the specified course.
     * Menyimpan video yang diupload ke kursus tertentu
     */
    public function uploadVideo(Request $request, Course $course)
    {
        $this->authorizeAccess($course);

        // Validasi inputan untuk video
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
            // Simpan file video ke storage dan simpan nama file ke database
            $filename = time() . '.' . $request->video->extension();
            $request->video->storeAs('public/videos', $filename);
            $video->filename = $filename;
        }

        $video->save();

        // Redirect kembali ke halaman detail course dengan pesan sukses
        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.show' : 'instructor.courses.show', $course->id)
                         ->with('success', 'Video berhasil ditambahkan.');
    }

    /**
     * Delete a video from the specified course.
     * Menghapus video dari kursus tertentu
     */
    public function deleteVideo(Course $course, Video $video)
    {
        $this->authorizeAccess($course);

        // Memastikan bahwa video yang dihapus benar-benar terkait dengan course yang diberikan
        if ($video->course_id != $course->id) {
            abort(403, 'Video ini tidak terkait dengan kursus tersebut.');
        }

        // Hapus file video jika ada
        if ($video->filename && Storage::exists('public/videos/' . $video->filename)) {
            Storage::delete('public/videos/' . $video->filename);
        }

        // Hapus data video dari database
        $video->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Video berhasil dihapus.');
    }

    /**
     * Authorize access to a course.
     * Memastikan bahwa instructor hanya bisa mengakses kursus miliknya
     */
    private function authorizeAccess(Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke kursus ini.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit kursus
     */
    public function edit(Course $course)
    {
        // Memastikan bahwa instructor hanya bisa mengedit kursus miliknya
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403); // Instructor hanya bisa mengedit kursus miliknya
        }

        // Ambil kategori, level, dan tags untuk form edit
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

        // Validasi data input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'youtube_thumbnail_url' => 'nullable|url',
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

      // Mengambil ID video dari URL YouTube
    if (!empty($validated['youtube_thumbnail_url'])) {
        $youtubeUrl = $validated['youtube_thumbnail_url'];
        parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $queryParams);

        if (isset($queryParams['v'])) {
            $course->youtube_thumbnail_url = $queryParams['v']; // ID video dari URL `https://www.youtube.com/watch?v=VIDEO_ID`
        } else {
            $course->youtube_thumbnail_url = basename(parse_url($youtubeUrl, PHP_URL_PATH)); // ID video dari URL `https://youtu.be/VIDEO_ID`
        }
    }
     

        $course->save();

        // Menyimpan tags
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
