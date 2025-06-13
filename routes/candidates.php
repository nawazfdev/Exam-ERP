<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateExamController;

/*
|--------------------------------------------------------------------------
| Candidate Routes
|--------------------------------------------------------------------------
|
| Here are the routes specific to candidate functionality including
| dashboard, exams, results, and profile management.
|
*/

Route::prefix('candidates')->name('candidates.')->group(function () {
    
    // Public Candidate Routes (Authentication handled in controllers if needed)
    Route::get('/login', [CandidateController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CandidateController::class, 'login'])->name('login.submit');
    Route::get('/register', [CandidateController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [CandidateController::class, 'register'])->name('register.submit');
    
    // Protected Candidate Routes
    Route::middleware('auth:candidate')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [CandidateController::class, 'dashboard'])->name('dashboard');
        
        // Exam Management
        Route::prefix('exams')->name('exam.')->group(function () {
             Route::get('/upcoming', [CandidateExamController::class, 'upcomingExams'])->name('upcoming');
            Route::prefix('{exam}')->group(function () {
                Route::get('/instructions', [CandidateExamController::class, 'instructions'])->name('instructions');
                Route::get('/start', [CandidateExamController::class, 'start'])->name('start');
                Route::post('/answer', [CandidateExamController::class, 'storeAnswer'])->name('storeAnswer');
                Route::post('/answer', [CandidateExamController::class, 'submitExam'])->name('submitExam');
                Route::post('/submit', [CandidateExamController::class, 'submit'])->name('submit');
                 Route::get('/result', [CandidateExamController::class, 'result'])->name('result');
                 Route::get('/completed', [CandidateExamController::class, 'completed'])->name('completed');

            });
        });
        
        // Results and Performance
        Route::get('/results', [CandidateController::class, 'results'])->name('results');
        Route::get('/results/{exam}', [CandidateController::class, 'examResult'])->name('results.exam');
        
        // Profile Management
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [CandidateController::class, 'profile'])->name('show');
            Route::get('/edit', [CandidateController::class, 'editProfile'])->name('edit');
            Route::put('/update', [CandidateController::class, 'updateProfile'])->name('update');
            Route::post('/avatar', [CandidateController::class, 'updateAvatar'])->name('avatar');
        });
        
        // Logout
        Route::post('/logout', [CandidateController::class, 'logout'])->name('logout');
    });
});