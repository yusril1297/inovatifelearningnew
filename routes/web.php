<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'index'])->name('frontend.home');


Route::get('/dashboard', function () {
    return view('students.dashboard');
})->middleware(['auth', 'verified', 'role:student'])->name('dashboard');

//admin
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadVideoForm'])->name('courses.uploadVideoForm');
    Route::post('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'uploadVideo'])->name('courses.uploadVideo');
    Route::delete('courses/{course}/video/{video}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteVideo'])->name('courses.deleteVideo');
    Route::resource('tags', TagController::class);
    Route::resource('levels',LevelController::class);
    Route::resource('students', StudentController::class);
    Route::resource('enrollments', EnrollmentController::class);
});

//instructor
Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('instructor.dashboard');
    })->name('dashboard');

    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadVideoForm'])->name('courses.uploadVideoForm');
    Route::post('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'uploadVideo'])->name('courses.uploadVideo');
    Route::delete('courses/{course}/video/{video}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteVideo'])->name('courses.deleteVideo');
    Route::resource('students', StudentController::class);
});



//admin dan instructor
Route::middleware(['auth', 'verified', 'role:admin|instructor'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadVideoForm'])->name('courses.uploadVideoForm');
    Route::post('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'uploadVideo'])->name('courses.uploadVideo');
    Route::delete('courses/{course}/video/{video}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteVideo'])->name('courses.deleteVideo');
    Route::resource('students', StudentController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
