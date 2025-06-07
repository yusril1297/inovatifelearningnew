<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\StudentDashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;




Route::middleware(['auth'])->prefix('certificate')->name('certificate.')->group(function () {
    Route::get('/course/{course}/generate', [CertificateController::class, 'generateCertificate'])->name('generate');
    Route::get('/course/{courseId}', [CertificateController::class, 'downloadCertificate'])->name('download');
});


Route::get('/', [FrontController::class, 'index'])->name('frontend.home');
Route::get('/all-courses', [FrontController::class, 'allCourses'])->name('frontend.allCourses');

Route::get('/categories/{slug}', [FrontController::class, 'showCategories'])->name('frontend.categories');

Route::get('/courses/{slug}', [FrontController::class, 'details'])->name('frontend.details');
Route::get('/instructor', [FrontController::class, 'instructor'])->name('frontend.instructor');
Route::get('/instructor/{id}/courses', [FrontController::class, 'instructorDetails'])->name('frontend.instructorDetails');
Route::get('/about', [FrontController::class, 'about'])->name('frontend.about');

// Route::get('/dashboard', function () {
//     return view('students.dashboard');
// })->middleware(['auth', 'verified', 'role:student'])->name('dashboard');
Route::post('/courses/{course}/certificate/upload', [CourseController::class, 'uploadCertificate'])
    ->name('courses.uploadCertificate');
    Route::post('/courses/{course}/certificate/upload', [CourseController::class, 'uploadCertificate'])
    ->name('courses.uploadCertificate');
    Route::post('/courses/{course}/certificate/upload', [CourseController::class, 'uploadCertificate'])
    ->withoutMiddleware(['auth']);

Route::middleware(['auth', 'verified', 'role:student'])->prefix('students')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');


    Route::get('/courses/{course}/learning/{video}', [FrontController::class, 'learning'])->name('frontend.learning');
    Route::get('/courses/{test}/test', [FrontController::class, 'test'])->name('frontend.test');
});

//admin
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Ini mengarahkan ke DashboardController

    Route::resource('categories', CategoryController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadVideoForm'])->name('courses.uploadVideoForm');
    Route::get('courses/{course}/upload-pdf', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadPdfForm'])->name('courses.uploadPdfForm');
    Route::post('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'uploadVideo'])->name('courses.uploadVideo');
    Route::post('courses/{course}/upload-pdf', [\App\Http\Controllers\Admin\CourseController::class, 'uploadPdf'])->name('courses.uploadPdf');
    Route::delete('courses/{course}/video/{video}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteVideo'])->name('courses.deleteVideo');
    Route::delete('courses/{course}/pdf/{pdf}', [\App\Http\Controllers\Admin\CourseController::class, 'deletePdf'])->name('courses.deletePdf');
    Route::resource('tags', TagController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('students', StudentController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'settings'])->name('settings');
    Route::post('settings/update', [\App\Http\Controllers\Admin\SettingController::class, 'settingUpdate'])->name('settings.update');
});

//instructor
Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('instructor.dashboard');
    })->name('dashboard');

    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadVideoForm'])->name('courses.uploadVideoForm');
    Route::get('courses/{course}/upload-pdf', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadPdfForm'])->name('courses.uploadPdfForm');
    Route::post('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'uploadVideo'])->name('courses.uploadVideo');
    Route::post('courses/{course}/upload-pdf', [\App\Http\Controllers\Admin\CourseController::class, 'uploadPdf'])->name('courses.uploadPdf');
    Route::delete('courses/{course}/video/{video}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteVideo'])->name('courses.deleteVideo');
    Route::delete('courses/{course}/pdf/{pdf}', [\App\Http\Controllers\Admin\CourseController::class, 'deletePdf'])->name('courses.deletePdf');
    Route::resource('students', StudentController::class);
});



//admin dan instructor
Route::middleware(['auth', 'verified', 'role:admin|instructor'])->group(function () {
    Route::resource('courses', CourseController::class);

    // Route untuk upload video
    Route::get('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadVideoForm'])->name('courses.uploadVideoForm');
    Route::post('courses/{course}/upload-video', [\App\Http\Controllers\Admin\CourseController::class, 'uploadVideo'])->name('courses.uploadVideo');
    Route::delete('courses/{course}/video/{video}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteVideo'])->name('courses.deleteVideo');

    // Route untuk upload PDF
    Route::get('courses/{course}/upload-pdf', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadPdfForm'])->name('courses.uploadPdfForm');
    Route::post('courses/{course}/upload-pdf', [\App\Http\Controllers\Admin\CourseController::class, 'uploadPdf'])->name('courses.uploadPdf');
    Route::delete('courses/{course}/pdf/{pdf}', [\App\Http\Controllers\Admin\CourseController::class, 'deletePdf'])->name('courses.deletePdf');

    // Route untuk upload sertifikat
    Route::get('courses/{course}/upload-certificate', [\App\Http\Controllers\Admin\CourseController::class, 'showUploadCertificateForm'])->name('courses.uploadCertificateForm');
    Route::post('courses/{course}/upload-certificate', [\App\Http\Controllers\Admin\CourseController::class, 'uploadCertificate'])->name('courses.uploadCertificate');
    Route::delete('courses/{course}/certificate/{certificate}', [\App\Http\Controllers\Admin\CourseController::class, 'deleteCertificate'])->name('courses.deleteCertificate');

    Route::resource('students', StudentController::class);

    //route for test
    Route::get('courses/test/create-question/{test}', [TestController::class, 'create'])->name('courses.createQuestion');
    Route::post('courses/test/store-question/{test}', [TestController::class, 'storeQuestion'])->name('courses.storeQuestion');
    Route::delete('courses/test/delete-question/{question}', [TestController::class, 'destroyQuestion'])->name('courses.deleteQuestion');
    Route::post('courses/test/store', [TestController::class, 'store'])->name('courses.storeTest');

    Route::get("notification", [\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile/information', [ProfileController::class, 'editInformation'])->name('profile.edit.information');
    Route::get('/profile/cv', [ProfileController::class, 'editCv'])->name('profile.edit.cv');
    Route::get('/profile/avatar', [ProfileController::class, 'editAvatar'])->name('profile.edit.avatar');
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.edit.password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    
    Route::put('/profile/cv', [ProfileController::class, 'updateCv'])->name('profile.update.cv');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout/{course:slug}', [PaymentController::class, 'checkout'])->name('frontend.checkout');
    Route::post('/payment/{enrollment}', [PaymentController::class, 'getSnapToken'])->name('frontend.payment.token');
    Route::get('/payment/notice/{enrollmentId}', [PaymentController::class, 'notice'])->name('frontend.payment.notice');
    Route::get('/payment/success/{order_id}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
});
// Route::post('/midtrans/webhook', [PaymentController::class, 'handleWebhook'])->name('midtrans.webhook')->middleware('midtrans');

Route::get('/download/{course}/{pdf}', [DownloadController::class, 'download'])->name('frontend.download');

require __DIR__ . '/auth.php';
