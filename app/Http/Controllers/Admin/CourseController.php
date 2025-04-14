<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\pdf;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Certificate;

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
        // Validasi role user (hanya Admin dan Instructor)
        if (!in_array(Auth::user()->role, [0, 1])) {
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
            'meeting_limit' => 'nullable|integer|min:1', // Validasi meeting limit
            "subscription_periods" => "required|in:month,week,year,lifetime",
            "subscription_duration" => "nullable|integer|min:1",
        ]);
    
        // Membuat slug unik
        $title = $validated['title'];
        $slug = Str::slug($title);
        
        // Cek apakah slug sudah ada, jika iya tambahkan angka unik
        $counter = 1;
        $originalSlug = $slug;
        while (DB::table('courses')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
    
        // Buat objek Course baru dan set data dari input
        $course = new Course();
        $course->title = $title;
        $course->slug = $slug; // Gunakan slug unik
        $course->description = $validated['description'];
        $course->category_id = $validated['category_id'];
        $course->level_id = $validated['level_id'];
        $course->price = $validated['price'];
        $course->status = $validated['status'];
        $course->meeting_limit = $validated['meeting_limit'] ?? null;
        $course->instructor_id = Auth::id();
    
        // Mengambil ID video dari URL YouTube
        if (!empty($validated['youtube_thumbnail_url'])) {
            $course->youtube_thumbnail_url = $this->convertYouTubeUrl($validated['youtube_thumbnail_url']);
        }
    
        // Simpan course ke database
        $course->save();
    
        // Redirect ke halaman index sesuai role user
        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
            ->with('success', 'Course created successfully.');
    }
    
    /**
 * Fungsi untuk mengonversi URL YouTube menjadi format embed.
 */
private function convertYouTubeUrl($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);

    // Jika URL dalam format https://www.youtube.com/watch?v=VIDEO_ID
    if (isset($queryParams['v'])) {
        $videoId = $queryParams['v'];
    } else {
        // Jika URL dalam format https://youtu.be/VIDEO_ID
        $videoId = basename(parse_url($url, PHP_URL_PATH));
    }

    return 'https://www.youtube.com/embed/' . $videoId;
}
    /**
     * Display the specified resource.
     * Menampilkan detail kursus berdasarkan role user
     */
    public function show(Course $course)
{
    $this->authorizeAccess($course);
    
    // Ambil semua video, PDF, dan sertifikat terkait dengan course ini
    $videos = $course->videos;
    $pdfs = Pdf::where('course_id', $course->id)->get(); // Pastikan model menggunakan Pdf
    $certificates = Certificate::where('course_id', $course->id)->get(); // Ambil semua sertifikat

    $user = Auth::user();

    
    // Tentukan tampilan berdasarkan role user
    $view = Auth::user()->role == 0 ? 'admin.courses.show' : 'instructor.courses.show';
    
    return view($view, compact('course', 'videos', 'pdfs', 'certificates',)); // Kirim ke view
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
     * Show the form for uploading a video.
     * Menampilkan form untuk upload video ke kursus
     */
    public function showUploadPdfForm(Course $course)
    {
        $this->authorizeAccess($course);

        $view = Auth::user()->role == 0 ? 'admin.courses.upload-pdf' : 'instructor.courses.upload-pdf';
        return view($view, compact('course'));
    }
   /**
     * Show the form for uploading a certificate.
     */
    public function showUploadCertificateForm(Course $course)
    {
        // Pastikan user memiliki akses
        $this->authorizeAccess($course);

        // Tentukan tampilan berdasarkan role
        $view = Auth::user()->role == 0 ? 'admin.courses.upload-certificate' : 'instructor.courses.upload-certificate';
        
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
            ->with('success', 'Video added successfully.');
    }

    /**
     * Post a pdf from the specified course.
     * Menyimpan pdf ke kursus tertentu
     */
    public function uploadPdf(Course $course, Request $request)
    {
        $this->authorizeAccess($course);

        // Validasi inputan untuk pdf
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:20000',
        ]);

        $pdf = new pdf();
        $pdf->course_id = $course->id;
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $pdf->pdf = $filename; // Simpan nama file
            $pdf->pdf_url = 'uploads/' . $filename; // Simpan path file
        }
        $pdf->save();

        // Redirect kembali ke halaman detail course dengan pesan sukses
        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.show' : 'instructor.courses.show', $course->id)
            ->with('success', 'Pdf added successfully.');
    }


    /**
     * Delete a pdf from the specified course.
     * Menghapus pdf dari kursus tertentu
     */
    public function deletePdf(Course $course, pdf $pdf)
    {
        $this->authorizeAccess($course);

        // Pastikan pdf terkait dengan course yang diberikan
        if ($pdf->course_id != $course->id) {
            abort(403, 'This pdf is not related to the course.');
        }

        // Periksa apakah file pdf ada dan hapus dari storage
        if (!empty($pdf->pdf) && Storage::exists('public/pdfs/' . $pdf->pdf)) {
            $deleted = Storage::delete('public/pdfs/' . $pdf->pdf);
            if (!$deleted) {
                return redirect()->back()->withErrors(['msg' => 'Failed to delete pdf file.']);
            }
        }

        // Hapus pdf dari database
        $pdf->delete();

        return redirect()->back()->with('success', 'Pdf deleted successfully.');
    }
    /**
     * Delete a video from the specified course.
     * Menghapus video dari kursus tertentu
     */
    public function deleteVideo(Course $course, Video $video)
    {
        $this->authorizeAccess($course);

        // Pastikan video terkait dengan course yang diberikan
        if ($video->course_id != $course->id) {
            abort(403, 'This video is not related to the course.');
        }

        // Periksa apakah file video ada dan hapus dari storage
        if (!empty($video->filename) && Storage::exists('public/videos/' . $video->filename)) {
            $deleted = Storage::delete('public/videos/' . $video->filename);
            if (!$deleted) {
                return redirect()->back()->withErrors(['msg' => 'Failed to delete video file.']);
            }
        }

        // Hapus video dari database
        $video->delete();

        return redirect()->back()->with('success', 'Video deleted successfully.');
    }


    // SERTIFIKAT UPLOAD
    public function uploadCertificate(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
    
        // Validasi file sertifikat
        $request->validate([
            'certificate' => 'required|mimes:pdf,png,jpg,jpeg|max:2048',
        ]);
    
        $file = $request->file('certificate');
        $filename = 'certificate_' . $course->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/certificates'), $filename);
    
        // Cek apakah sertifikat sudah ada, jika ada update, jika belum buat baru
        $certificate = Certificate::updateOrCreate(
            ['course_id' => $course->id],
            [
                'user_id' => Auth::id(),
                'certificate_url' => 'uploads/certificates/' . $filename,
                'certificate_code' => strtoupper(Str::random(10)) // Membuat kode sertifikat acak
            ]
        );
    
        return back()->with('success', 'Sertifikat berhasil diunggah.');
    }
    public function deleteCertificate(Course $course)
{
    // Pastikan pengguna memiliki akses ke kursus ini
    $this->authorizeAccess($course);

    // Pastikan ada file sertifikat yang perlu dihapus
    if (!empty($course->certificate_url) && file_exists(public_path($course->certificate_url))) {
        // Coba hapus file sertifikat dan tangani jika gagal
        try {
            unlink(public_path($course->certificate_url));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus file sertifikat.')->with('exception', $e->getMessage());
        }
    }

    // Hapus data URL sertifikat dari kursus
    $course->certificate_url = null;
    $course->save();

    // Hapus data sertifikat dari database (optional, jika Anda ingin menghapus entri sertifikat)
    $course->certificate()->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Certificate deleted successfully.');
}

    //
    /**
     * Authorize access to a course.
     * Memastikan bahwa instructor hanya bisa mengakses kursus miliknya
     */
    private function authorizeAccess(Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403, 'You do not have access to this course.');
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
    public function update(Request $request, Course $course)
    {
        // Pastikan instructor hanya bisa mengupdate kursus miliknya
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403);
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
            'meeting_limit' => 'nullable|integer|min:1', // Validasi untuk meeting_limit
        ]);
    
        // Update data course
        $course->title = $validated['title'];
        $course->slug = Str::slug($validated['title']);
        $course->description = $validated['description'];
        $course->category_id = $validated['category_id'];
        $course->level_id = $validated['level_id'];
        $course->price = $validated['price'];
        $course->status = $validated['status'];
        $course->meeting_limit = $validated['meeting_limit'] ?? null; // Simpan meeting limit jika ada
    
        // Mengambil ID video dari URL YouTube
        if (!empty($validated['youtube_thumbnail_url'])) {
            $youtubeUrl = $validated['youtube_thumbnail_url'];
            parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $queryParams);
    
            // Jika URL dalam format `https://www.youtube.com/watch?v=VIDEO_ID`
            if (isset($queryParams['v'])) {
                $videoId = $queryParams['v'];
            } else {
                // Jika URL dalam format `https://youtu.be/VIDEO_ID`
                $videoId = basename(parse_url($youtubeUrl, PHP_URL_PATH));
            }
    
            // Simpan URL dalam format embed
            $course->youtube_thumbnail_url = 'https://www.youtube.com/embed/' . $videoId;
        }
    
        // Simpan perubahan ke database
        $course->save();
    
        // Menyimpan tags
        if (isset($validated['tags'])) {
            $course->tags()->sync($validated['tags']);
        } else {
            $course->tags()->detach();
        }
    
        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
            ->with('success', 'Course updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (Auth::user()->role == 1 && $course->instructor_id != Auth::id()) {
            abort(403); // Instructor hanya bisa menghapus kursus miliknya
        }

        $course->delete();

        return redirect()->route(Auth::user()->role == 0 ? 'admin.courses.index' : 'instructor.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
