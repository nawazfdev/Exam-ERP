<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

/*
|--------------------------------------------------------------------------
| Organization Routes
|--------------------------------------------------------------------------
|
| Here are the routes specific to organization functionality including
| management, settings, and organization-specific operations.
|
*/

Route::prefix('organizations')->name('organizations.')->group(function () {
    
    // Public Organization Routes
    Route::get('/', [OrganizationController::class, 'publicIndex'])->name('public.index');
    Route::get('/{organization:slug}', [OrganizationController::class, 'publicShow'])->name('public.show');
    
    // Organization Authentication Routes
    Route::get('/login', [OrganizationController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [OrganizationController::class, 'login'])->name('login.submit');
    Route::get('/register', [OrganizationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [OrganizationController::class, 'register'])->name('register.submit');
    
    // Protected Organization Routes
    Route::middleware('auth:organization')->group(function () {
        
        // Organization Dashboard
        Route::get('/dashboard', [OrganizationController::class, 'dashboard'])->name('dashboard');
        
        // Organization Management
        Route::prefix('manage')->name('manage.')->group(function () {
            // Organization Profile
            Route::get('/profile', [OrganizationController::class, 'profile'])->name('profile');
            Route::get('/profile/edit', [OrganizationController::class, 'editProfile'])->name('profile.edit');
            Route::put('/profile', [OrganizationController::class, 'updateProfile'])->name('profile.update');
            
            // Organization Settings
            Route::get('/settings', [OrganizationController::class, 'settings'])->name('settings');
            Route::put('/settings', [OrganizationController::class, 'updateSettings'])->name('settings.update');
            
            // Candidate Management
            Route::prefix('candidates')->name('candidates.')->group(function () {
                Route::get('/', [OrganizationController::class, 'candidates'])->name('index');
                Route::get('/create', [OrganizationController::class, 'createCandidate'])->name('create');
                Route::post('/', [OrganizationController::class, 'storeCandidate'])->name('store');
                Route::get('/{candidate}/edit', [OrganizationController::class, 'editCandidate'])->name('edit');
                Route::put('/{candidate}', [OrganizationController::class, 'updateCandidate'])->name('update');
                Route::delete('/{candidate}', [OrganizationController::class, 'destroyCandidate'])->name('destroy');
                Route::get('/{candidate}/results', [OrganizationController::class, 'candidateResults'])->name('results');
            });
            
            // Exam Management
            Route::prefix('exams')->name('exams.')->group(function () {
                Route::get('/', [OrganizationController::class, 'exams'])->name('index');
                Route::get('/create', [OrganizationController::class, 'createExam'])->name('create');
                Route::post('/', [OrganizationController::class, 'storeExam'])->name('store');
                Route::get('/{exam}', [OrganizationController::class, 'showExam'])->name('show');
                Route::get('/{exam}/edit', [OrganizationController::class, 'editExam'])->name('edit');
                Route::put('/{exam}', [OrganizationController::class, 'updateExam'])->name('update');
                Route::delete('/{exam}', [OrganizationController::class, 'destroyExam'])->name('destroy');
                Route::get('/{exam}/results', [OrganizationController::class, 'examResults'])->name('results');
                Route::post('/{exam}/publish', [OrganizationController::class, 'publishExam'])->name('publish');
                Route::post('/{exam}/unpublish', [OrganizationController::class, 'unpublishExam'])->name('unpublish');
            });
            
            // Reports and Analytics
            Route::prefix('reports')->name('reports.')->group(function () {
                Route::get('/', [OrganizationController::class, 'reports'])->name('index');
                Route::get('/candidates', [OrganizationController::class, 'candidateReports'])->name('candidates');
                Route::get('/exams', [OrganizationController::class, 'examReports'])->name('exams');
                Route::get('/performance', [OrganizationController::class, 'performanceReports'])->name('performance');
                Route::post('/export', [OrganizationController::class, 'exportReports'])->name('export');
            });
        });
        
        // Logout
        Route::post('/logout', [OrganizationController::class, 'logout'])->name('logout');
    });
    
    // Admin Routes for Organizations (within admin middleware)
    Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('organizations', OrganizationController::class);
        Route::post('organizations/{organization}/approve', [OrganizationController::class, 'approve'])->name('organizations.approve');
        Route::post('organizations/{organization}/reject', [OrganizationController::class, 'reject'])->name('organizations.reject');
        Route::post('organizations/{organization}/suspend', [OrganizationController::class, 'suspend'])->name('organizations.suspend');
    });
});