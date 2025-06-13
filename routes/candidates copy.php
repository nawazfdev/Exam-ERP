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
            // Upcoming exams list
            Route::get('/upcoming', [CandidateExamController::class, 'upcomingExams'])->name('upcoming');
            
            // Individual exam routes
            Route::prefix('{exam}')->group(function () {
                Route::get('/instructions', [CandidateExamController::class, 'instructions'])->name('instructions');
                Route::get('/start', [CandidateExamController::class, 'start'])->name('start');
                Route::post('/answer', [CandidateExamController::class, 'storeAnswer'])->name('storeAnswer');
                Route::post('/submit', [CandidateExamController::class, 'submit'])->name('submit');
                Route::get('/result', [CandidateExamController::class, 'result'])->name('result');
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
        
        // Certificates
        Route::prefix('certificates')->name('certificates.')->group(function () {
            Route::get('/', [CandidateController::class, 'certificates'])->name('index');
            Route::get('/{certificate}/download', [CandidateController::class, 'downloadCertificate'])->name('download');
        });
        
        // Practice Tests
        Route::prefix('practice')->name('practice.')->group(function () {
            Route::get('/', [CandidateController::class, 'practiceTests'])->name('index');
            Route::get('/{practice}/start', [CandidateController::class, 'startPractice'])->name('start');
            Route::post('/{practice}/submit', [CandidateController::class, 'submitPractice'])->name('submit');
        });
        
        // Study Materials
        Route::prefix('study-materials')->name('study.')->group(function () {
            Route::get('/', [CandidateController::class, 'studyMaterials'])->name('index');
            Route::get('/{material}/download', [CandidateController::class, 'downloadMaterial'])->name('download');
        });
        
        // Announcements
        Route::prefix('announcements')->name('announcements.')->group(function () {
            Route::get('/', [CandidateController::class, 'announcements'])->name('index');
            Route::get('/{announcement}', [CandidateController::class, 'showAnnouncement'])->name('show');
            Route::post('/{announcement}/mark-read', [CandidateController::class, 'markAsRead'])->name('mark-read');
        });
        
        // Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [CandidateController::class, 'settings'])->name('index');
            Route::put('/preferences', [CandidateController::class, 'updatePreferences'])->name('preferences');
            Route::put('/password', [CandidateController::class, 'updatePassword'])->name('password');
            Route::put('/notifications', [CandidateController::class, 'updateNotifications'])->name('notifications');
        });
        
        // Help & Support
        Route::prefix('support')->name('support.')->group(function () {
            Route::get('/', [CandidateController::class, 'support'])->name('index');
            Route::get('/faq', [CandidateController::class, 'faq'])->name('faq');
            Route::get('/contact', [CandidateController::class, 'contact'])->name('contact');
            Route::post('/ticket', [CandidateController::class, 'createTicket'])->name('ticket');
        });
        
        // Logout
        Route::post('/logout', [CandidateController::class, 'logout'])->name('logout');
    });
});