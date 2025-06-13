<?php

use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CandidateGroupController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\IndustryCategoryController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\ProcessTechnologyController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionCategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ConsultationFormController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\UpcomingExamController;
use App\Http\Controllers\CandidateExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Page;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Direct route to the home page
// Route::get('/{slug}', function ($slug) {
//     $page = Page::where('slug', $slug)->firstOrFail(); // Correct reference

//     return view('Pages.show', compact('page'));
// });
// Route::get('/tt', function () {
//   $targetFolder=storage_path('app/public');
//   $linkFolder=$_SERVER['DOCUMENT_ROOT'].'/storage';
//   symlink($targetFolder,$linkFolder);
// });

Auth::routes();
Route::post('/consultation/store', [ConsultationFormController::class, 'store'])->name('consultation.store');
Route::post('/contact-us/store', [ContactFormController::class, 'store'])->name('contact.store');
Route::get('/detail/{slug}', [PageController::class, 'showDetailPage'])->name('detail.page');
// Route for the homepage
Route::get('/', [PageController::class, 'showHome'])->name('index');
//Route for dynamic pages based on slugs
Route::get('/{slug}', [PageController::class, 'showFrontPage'])
    ->where('slug', '[a-zA-Z0-9-_]+') // Allow alphanumeric and hyphens/underscores
    ->name('pages.show');


// Route::get('/dashboard', [FrontController::class, 'Dashboard'])->name('front.dashboard');
Route::get('/about', [FrontController::class, 'showAboutPage'])->name('front.about');

//Route::get('/hotels/{slug}', [FrontController::class, 'showHotelDetailsPage'])->name('front.hotel.details');
Route::get('/category/{categoryId}', [FrontController::class, 'indexGetData'])->name('front.home.category');

// Route for showing the subscription form (GET request)
Route::get('/subscribe/{lang?}', [FrontController::class, 'index'])->name('subscribe.form');
Route::get('/blogs/{lang?}', [FrontController::class, 'showBlogs'])->name('front.blogs');
Route::get('/stories/{lang?}', [FrontController::class, 'showStories'])->name('front.stories');
Route::get('/blog/{post}/{lang?}', [FrontController::class, 'showPost'])->name('front.blog_details');
Route::get('/treatment/{id}/{lang?}', [FrontController::class, 'showTreatments'])->name('front.treatment_details');
Route::post('/change-locale', [LocaleController::class, 'changeLocale'])->name('change-locale');
Route::any('language/{locale}', [LocaleController::class, 'changeLocale'])->name('language');
Route::post('/get-translations', [LocaleController::class, 'getTranslations'])->name('get-translations');
// Route for handling the form submission (POST request)
Route::post('/subscribe/{lang?}', [FrontController::class, 'storeSubscription'])->name('subscribe.store');
// Common Logout Route for All Users (Admin & User)
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

 

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resources([
        'SiteSettings' => SiteSettingController::class,
        'Organizations' => OrganizationController::class,
        'CandidateGroups' => CandidateGroupController::class,
        'Candidates' => CandidateController::class,
        'Sections' => SectionController::class,
        'Exams' => ExamController::class,
        'HomeSections' => HomeSectionController::class,
        'Sliders' => SliderController::class,
        'Products' => ProductController::class,
        'ProcessTechnologies' => ProcessTechnologyController::class,
        'Investors' => InvestorController::class,
        'IndustryCategories' => IndustryCategoryController::class,
        'AboutUs' => AboutUsController::class,
        'Industries' => IndustryController::class,
        'Pages' => PageController::class,
        'Categories' => CategoryController::class,
        'QuestionCategories' => QuestionCategoryController::class,
        'Questions' => QuestionController::class,
        'BlogCategories' => BlogCategoryController::class,
        'BlogPosts' => BlogPostController::class,
        'Stories' => StoryController::class,
        'Testimonials' => TestimonialController::class,
        'users' => UserController::class,
        'Roles' => RoleController::class,

    ]);

    Route::post('blog-post/upload-image', [BlogPostController::class, 'uploadImage'])->name('BlogPosts.uploadImage');
    Route::post('/products/upload-image', [ProductController::class, 'uploadImage'])->name('Products.uploadImage');
    Route::post('/processtechnologies/upload-image', [ProcessTechnologyController::class, 'uploadImage'])->name('ProcessTechnologies.uploadImage');
    Route::post('investors/upload-image', [InvestorController::class, 'uploadImage'])->name('Investors.uploadImage');
    Route::post('industries/upload-image', [IndustryController::class, 'uploadImage'])->name('Industries.uploadImage');
    Route::post('stories/upload-image', [StoryController::class, 'uploadImage'])->name('Stories.uploadImage');
    Route::post('pages/upload-image', [PageController::class, 'uploadImage'])->name('Pages.uploadImage');

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/admin/login'); // Redirect to admin login page
    })->name('admin.logout');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});


// // Organization Admin Routes
// Route::prefix('organization')->middleware(['auth', 'role:organization-admin'])->name('organization.')->group(function () {
//     Route::get('/dashboard', [OrganizationAdminController::class, 'dashboard'])->name('dashboard');
    
//     // Candidate Management (Organization Admin only)
//     Route::resource('candidates', CandidateController::class);
//     Route::resource('candidate-groups', CandidateGroupController::class);
    
//     // Exam Management (Organization Admin only)
//     Route::resource('exams', ExamController::class);
//     Route::resource('questions', QuestionController::class);
//     Route::resource('question-categories', QuestionCategoryController::class);
    
//     // Results and Reports (Organization-scoped)
//     Route::get('/results', [OrganizationAdminController::class, 'results'])->name('results');
//     Route::get('/reports', [OrganizationAdminController::class, 'reports'])->name('reports');
// });

 

// Protected Candidate Routes
// Route::prefix('candidates')->middleware('candidate.auth')->name('candidates.')->group(function () {
//     Route::get('/dashboard', [CandidateController::class, 'dashboard'])->name('dashboard');
//     Route::get('/upcoming-exams', [CandidateExamController::class, 'upcomingExams'])->name('upcoming-exams');
//     Route::get('/exam/{exam}/start', [CandidateExamController::class, 'start'])->name('exam.start');
//     Route::post('/exam/{exam}/submit', [CandidateExamController::class, 'submit'])->name('exam.submit');
//     Route::get('/results', [CandidateController::class, 'results'])->name('results');
//     Route::get('/profile', [CandidateController::class, 'profile'])->name('profile');
// });