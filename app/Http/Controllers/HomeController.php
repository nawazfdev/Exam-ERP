<?php

namespace App\Http\Controllers;
use App\Models\ProcessTechnology;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\BlogPost;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Investor;
use App\Models\Story;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::denies('show-dashboard')) {
            abort(403, 'Unauthorized');
        }
        // Fetch the counts for Pages, Blogs, Sliders, Processes, Products, Investors, Stories, Testimonials, and Users
        $pagesCount = Page::count();
        $blogsCount = BlogPost::count();
        $slidersCount = Slider::count();
        $processesCount = ProcessTechnology::count();
        $productsCount = Product::count(); // Assuming you have a Product model
        $investorsCount = Investor::count(); // Assuming you have an Investor model
        $storiesCount = Story::count(); // Assuming you have a Story model
        $testimonialsCount = Testimonial::count(); // Assuming you have a Testimonial model
        $usersCount = User::count(); // Assuming you have a User model
        $siteSettings = SiteSetting::find(1);
        // Pass the data to the view
        return view('home', compact('pagesCount', 'blogsCount', 'slidersCount', 'processesCount', 'productsCount', 'investorsCount', 'storiesCount', 'testimonialsCount', 'usersCount','siteSettings'));
    }

}
