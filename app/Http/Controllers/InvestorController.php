<?php

namespace App\Http\Controllers;
use App\Models\Investor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('show-investors')) {
            abort(403, 'Unauthorized');
        }
        $investors = Investor::latest()->get();
        return view('Investors.index', compact('investors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Gate::denies('create-investors')) {
            abort(403, 'Unauthorized');
        }
        return view('Investors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required|string|max:255',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
        // Handle feature image upload
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $imagePath = $request->file('feature_image')->store('investors', 'public');
        }
        // Save investor
        Investor::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'feature_image' => $imagePath,
            'description' => $request->description,
        ]);
        return redirect()->route('Investors.index')->with('success', 'Investor created successfully.');
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('investors/summernote', 'public');

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
        if (Gate::denies('edit-investors')) {
            abort(403, 'Unauthorized');
        }
        // Find the product using the slug
        $investor = Investor::where('slug', $slug)->firstOrFail();
        // Return the edit view with the investor data
        return view('Investors.edit', compact('investor'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $investor = investor::findOrFail($id);
        // Handle feature image upload and deletion
        if ($request->hasFile('feature_image')) {
            // Delete the old feature image if it exists
            if ($investor->feature_image && Storage::exists('public/investors/' . $investor->feature_image)) {
                Storage::delete('public/investors/' . $investor->feature_image);
            }
            // Save the new feature image
            $image = $request->file('feature_image');
            $imagePath = $image->store('investors', 'public');
            $investor->feature_image = $imagePath;
        }
        // Handle Summernote image cleanup and new description
        if ($request->has('description')) {
            // Extract all image URLs from the old description (from the database)
            preg_match_all('/<img[^>]+src=["\'](http[^"\']+\.(jpg|jpeg|png|gif|webp))["\']/i', $investor->description, $matches);
            $oldImages = $matches[1]; // Array of old image paths in the product description
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
                }
            }
        }
        // Update the product with the new data
        $investor->title = $request->input('title');
        $investor->description = $request->input('description'); // Update the description with the new content
        $investor->save();
        return redirect()->route('Investors.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-investors')) {
            abort(403, 'Unauthorized');
        }
        $investor = Investor::findOrFail($id);
        // Delete the image file if it exists
        if ($investor->feature_image) {
            $imagePath = storage_path('app/public/' . $investor->feature_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the investor record from the database
        $investor->delete();
        return redirect()->route('Investors.index')->with('success', 'Investor deleted successfully');
    }

}
