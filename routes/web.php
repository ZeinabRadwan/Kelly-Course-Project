<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

// Public Home Page
Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// Authenticated Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('courses', CourseController::class);
});

// Verified + Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// User resource (consider securing or limiting access)
Route::resource('user', UserController::class);
use App\Http\Controllers\QuestionController;

Route::get('/courses/{course}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/courses/{course}/questions', [QuestionController::class, 'store'])->name('questions.store');
use App\Http\Controllers\QuizController;

// Route to create quiz (randomly selects questions)
Route::get('/courses/{course}/quiz', [QuizController::class, 'create'])->name('quiz.create');

// Route to submit quiz answers
Route::post('/courses/{course}/quiz', [QuizController::class, 'store'])->name('quiz.store');
Route::get('quiz/{course}/responses', [QuizController::class, 'showResponses'])->name('quiz.responses');

Route::get('/users/{user}/certificates', [UserController::class, 'showCertificates'])->name('users.certificates');
Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');

Route::get('/certificate/download', [CertificateController::class, 'downloadCertificate'])->name('certificate.download');

require __DIR__.'/auth.php';
