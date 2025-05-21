<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\SiteSetting;
use App\Models\Subscription;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;
use App\Mail\ContactUsConfirmation;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Story;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.index');
    }

    public function showAboutPage()
    {
        return view('front.about');
    }

    public function showBlogs($lang = "de")
    {
        //
        $siteSettings = SiteSetting::find(1);
        $blogCategories = BlogCategory::all();
        // dd($blogCategories);
        $blogPosts = BlogPost::orderBy('created_at', 'desc')->paginate(5);
        $postDates = $blogPosts->pluck('created_at')->toArray();
        // dd($postDates);
        return view('front.blogs', compact('postDates', 'blogCategories', 'blogPosts', 'siteSettings'));

    }
    public function showStories($lang = "de")
    {
        //
        app()->setLocale($lang);
        $siteSettings = SiteSetting::find(1);
        $stories = Story::orderBy('created_at', 'desc')->paginate(5);
        //  dd($stories);
        return view('front.stories', compact('stories', 'siteSettings'));

    }
    public function showContactUs($lang = "de")
    {
        //
        app()->setLocale($lang);
        $siteSettings = SiteSetting::find(1);

        return view('front.contactus', compact('siteSettings'));

    }
    public function storeContact(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'message' => 'required',
        ]);

        $data = $request->all();
        ContactForm::create($request->all());

        Mail::to('ishaqkhan188@gmail.com')->send(new ContactUsConfirmation($data));
        return redirect()->back()->with('success', 'Thank you for your message!');


    }

    public function showPost($id)
    {
        $siteSettings = SiteSetting::find(1);
        $blogCategories = BlogCategory::all();
        // dd($blogCategories);
        $blogPost = BlogPost::find($id);

        $postDates = $blogPost->pluck('created_at')->toArray();
        // dd($postDates);
        return view('front.blogs_details', compact('postDates', 'blogCategories', 'blogPost', 'siteSettings'));
    }

}
