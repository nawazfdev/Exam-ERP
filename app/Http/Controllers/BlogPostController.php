<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('show-blogposts')) {
            abort(403, 'Unauthorized');
        }
        $blogposts = BlogPost::paginate(10);
        //  dd($blogposts);
        return view('BlogPosts.index', compact('blogposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('create-blogposts')) {
            abort(403, 'Unauthorized');
        }
        $blogcategories = BlogCategory::all();
        return view('BlogPosts.create', compact('blogcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('create-blogposts')) {
            abort(403, 'Unauthorized');
        }
        // Validate request
        $request->validate([
            'title' => 'required|string|max:255',
            'blogcategory_id' => 'required|integer|exists:blog_categories,id',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
        // Handle feature image upload
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $imagePath = $request->file('feature_image')->store('blogposts', 'public');
        }
        // Save product
        BlogPost::create([
            'title' => $request->title,
            'blogcategory_id' => $request->blogcategory_id,
            'slug' => Str::slug($request->title),
            'feature_image' => $imagePath,
            'description' => $request->description,
        ]);
        return redirect()->route('BlogPosts.index')->with('success', 'Blog Post created successfully.');
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('blogposts/summernote', 'public');

            return response()->json(['url' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'Upload failed'], 400);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        if (Gate::denies('edit-blogposts')) {
            abort(403, 'Unauthorized');
        }
        // Find the blog post using the slug
        $blogpost = BlogPost::where('slug', $slug)->firstOrFail();
        // Fetch categories for dropdown selection
        $blogcategories = BlogCategory::all();
        // Return the edit view with the blog post data
        return view('BlogPosts.edit', compact('blogpost', 'blogcategories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('edit-blogposts')) {
            abort(403, 'Unauthorized');
        }
        $blogPost = BlogPost::findOrFail($id);
        // Handle feature image upload and deletion
        if ($request->hasFile('feature_image')) {
            // Delete the old feature image if it exists
            if ($blogPost->feature_image && Storage::exists('public/blogposts/' . $blogPost->feature_image)) {
                Storage::delete('public/blogposts/' . $blogPost->feature_image);
            }
             // Save the new feature image
             $image = $request->file('feature_image');
             $imagePath = $image->store('blogposts', 'public');
             $blogPost->feature_image = $imagePath;
        }
        // Handle Summernote image cleanup and new description
        if ($request->has('description')) {
            // Extract all image URLs from the old description (from the database)
            preg_match_all('/<img[^>]+src=["\'](http[^"\']+\.(jpg|jpeg|png|gif|webp))["\']/i', $blogPost->description, $matches);
            $oldImages = $matches[1]; // Array of old image paths in the blogPost description
            // Extract all image URLs from the new description (from the form input)
            preg_match_all('/<img[^>]+src=["\'](http[^"\']+\.(jpg|jpeg|png|gif|webp))["\']/i', $request->input('description'), $newMatches);
            $newImages = $newMatches[1]; // Array of new image paths in the updated description
            // Find the old images that are no longer in the new description
            $imagesToDelete = array_diff($oldImages, $newImages);
            // Delete the old images that are no longer in the new description
            foreach ($imagesToDelete as $imageUrl) {
                $imagePath = public_path(str_replace('http://127.0.0.1:8001/storage', 'storage', $imageUrl)); // Fix the path to the local storage directory
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the old image file
                } else {
                    // Log the missing image or handle the error
                }
            }
        }
        // Update the product with the new data
        $blogPost->title = $request->input('title');
        $blogPost->description = $request->input('description');
        $blogPost->blogcategory_id = $request->input('blogcategory_id'); 
        $blogPost->save();
        return redirect()->route('BlogPosts.index')->with('success', 'Blog Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies('delete-blogposts')) {
            abort(403, 'Unauthorized');
        }
        $blogposts = BlogPost::find($id);
        if ($blogposts) {
            $blogposts->delete();
        }
        return redirect()->route('BlogPosts.index')->with('success', 'Blog deleted successfully.');
    }
}
