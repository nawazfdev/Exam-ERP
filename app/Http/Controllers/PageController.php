<?php

namespace App\Http\Controllers;
use App\Models\SiteSetting;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProcessTechnology;
use App\Models\AboutUs;
use App\Models\HomeSection;
use App\Models\Story;
use App\Models\Industry;
use App\Models\Testimonial;
use App\Models\BlogPost;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    // Display all pages (index page)
    public function index()
    {
        if (Gate::denies('show-pages')) {
            abort(403, 'Unauthorized');
        }
        $pages = Page::all();  // Get all pages from the database
        return view('Pages.index', compact('pages'));
    }
    public function showHome()
    {
        $siteSettings = SiteSetting::find(1);
        // This method is for showing the homepage
        $page = Page::where('slug', 'index')->first();
        if (!$page) {
            // Handle missing home page if needed
            abort(404, 'Home page not found');
        }
        $pages = Page::where('status', 1)->get();
       // dd($pages);
        $products = Product::latest()->get();
        // dd($products);
        $processes = ProcessTechnology::latest()->get();
        // dd($processes);
        $processes = ProcessTechnology::latest()->get();
        // dd($processes);
        $investors = Investor::latest()->get();
        // dd($investors);
        $user = Auth::user();
        // Get random slides (mixing products & process technologies)
        $allProducts = Product::inRandomOrder()->get();
        $allProcesses = ProcessTechnology::inRandomOrder()->get();

        // Create new instances of the collections using collect()
        $productsClone = collect($allProducts->all());
        $processesClone = collect($allProcesses->all());

        $slides1 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides2 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides3 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides4 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides5 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides6 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        // dd($slides3);
        $aboutUs = AboutUs::with('items')->first();
        //dd($aboutUs);
        $homesectionsstories = HomeSection::where('type', 'Stories')->latest()->get();
        // dd($homesectionsstories);
        $homesectionsindustries = HomeSection::where('type', 'Industries')->latest()->get();
        //dd($homesectionsindustries);
        $stories = Story::latest()->get();
        //dd( $stories);
        $industries = Industry::latest()->get();
        //dd($industries);
        $homesectionsreviews = HomeSection::where('type', 'Reviews')->latest()->get();
        // dd($homesectionsreviews);
        $testimonials = Testimonial::latest()->get();
        //  dd($testimonials);
        $homesectionsnews = HomeSection::where('type', 'News')->latest()->get();
        // dd($homesectionsnews);
        $blogposts = BlogPost::latest()->get();
        // dd($blogposts);
        // Return the home page view
        return view('front.dynamic_page', compact('siteSettings','page','pages', 'products', 'processes', 'investors','slides1', 'slides2', 'slides3', 'slides4', 'slides5', 'slides6', 'aboutUs', 'homesectionsstories', 'stories', 'homesectionsindustries', 'industries', 'homesectionsreviews', 'testimonials', 'homesectionsnews', 'blogposts'));
    }

    // Show a single page
    public function showFrontPage($slug)
    {
        // Fetch the page using the slug
        $page = Page::where('slug', $slug)->first();
        if (!$page) {
            // Show a 404 error if the page is not found
            abort(404, 'Page not found');
        }
        $pages = Page::where('status', 1)->get();
       // dd($pages);
        $products = Product::latest()->get();
        // dd($products);
        $processes = ProcessTechnology::latest()->get();
        // dd($processes);
        $processes = ProcessTechnology::latest()->get();
        // dd($processes);
        $investors = Investor::latest()->get();
        // dd($investors);
        $user = Auth::user();
        // Get random slides (mixing products & process technologies)
        $allProducts = Product::inRandomOrder()->get();
        $allProcesses = ProcessTechnology::inRandomOrder()->get();
        // Create new instances of the collections using collect()
        $productsClone = collect($allProducts->all());
        $processesClone = collect($allProcesses->all());
        $slides1 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides2 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides3 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides4 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides5 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        $slides6 = $productsClone->splice(0, 1)->merge($processesClone->splice(0, 1));
        // dd($slides3);
        $aboutUs = AboutUs::with('items')->first();
        //dd($aboutUs);
        $homesectionsstories = HomeSection::where('type', 'Stories')->latest()->get();
        // dd($homesectionsstories);
        $homesectionsindustries = HomeSection::where('type', 'Industries')->latest()->get();
        //dd($homesectionsindustries);
        $stories = Story::latest()->get();
        //dd( $stories);
        $industries = Industry::latest()->get();
        //dd($industries);
        $homesectionsreviews = HomeSection::where('type', 'Reviews')->latest()->get();
        // dd($homesectionsreviews);
        $testimonials = Testimonial::latest()->get();
        //  dd($testimonials);
        $homesectionsnews = HomeSection::where('type', 'News')->latest()->get();
        // dd($homesectionsnews);
        $blogposts = BlogPost::latest()->get();
        // dd($blogposts);

        // Return the dynamic page view
        return view('front.dynamic_page', compact('page','pages', 'products', 'processes', 'investors','slides1', 'slides2', 'slides3', 'slides4', 'slides5', 'slides6', 'aboutUs', 'homesectionsstories', 'stories', 'homesectionsindustries', 'industries', 'homesectionsreviews', 'testimonials', 'homesectionsnews', 'blogposts'));
    }
    public function showDetailPage($slug)
    {
        // Define models to check against
        $models = [
            'products' => Product::class,
            'process-technologies' => ProcessTechnology::class,
            'stories' => Story::class,
            'industries' => Industry::class,
            'blogs' => BlogPost::class,

        ];
        $item = null;
        $type = null;
        // Loop through models and find the matching slug
        foreach ($models as $key => $model) {
            $item = $model::where('slug', $slug)->first();
            if ($item) {
                $type = $key; // Store the type of the found model
                break;
            }
        }
        if (!$item) {
            abort(404, 'Page not found');
        }
        return view('front.detail_page', compact('item', 'type', 'models'));
    }
    // Show the form to create a new page
    public function create()
    {
        if (Gate::denies('create-pages')) {
            abort(403, 'Unauthorized');
        }
        return view('Pages.create');
    }
    // Store a newly created page
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:pages,slug',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);
        // Upload feature image
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $imagePath = $request->file('feature_image')->store('pages', 'public');
        }
        // Create Page
        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug), // Ensure it's properly formatted
            'feature_image' => $imagePath,
            'content' => $request->content,
            'status' => $request->status,
        ]);
        return redirect()->route('Pages.index')->with('success', 'Page created successfully.');
    }
    // Show the form to edit a page
    public function edit($id)
    {
        if (Gate::denies('edit-pages')) {
            abort(403, 'Unauthorized');
        }
        $page = Page::findOrFail($id);
        return view('Pages.edit', compact('page'));
    }
    // Update the page
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:pages,slug,' . $id,
            'feature_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);
        $page = Page::findOrFail($id);
        // Handle image upload
        if ($request->hasFile('feature_image')) {
            // Delete old image if exists
            if ($page->feature_image) {
                Storage::delete('public/' . $page->feature_image);
            }
            // Store new image
            $imagePath = $request->file('feature_image')->store('pages', 'public');
            $page->feature_image = $imagePath;
        }
        // Update page details
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->status = $request->status;
        $page->save();
        return redirect()->route('Pages.index')->with('success', 'Page updated successfully.');
    }

    // Delete the page
    public function destroy($id)
    {
        if (Gate::denies('delete-pages')) {
            abort(403, 'Unauthorized');
        }
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('Pages.index');
    }
}
