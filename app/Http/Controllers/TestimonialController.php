<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Gate::denies('show-testimonials')) {
            abort(403, 'Unauthorized');
        }
        $testimonials = Testimonial::latest()->get();
        return view('Testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Gate::denies('create-testimonials')) {
            abort(403, 'Unauthorized');
        }
        return view('Testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'review' => 'required|string',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Handle feature image upload
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $imagePath = $request->file('feature_image')->store('testimonials', 'public');
        }
        // Save Testimonial
        Testimonial::create([
            'name' => $request->name,
            'location' => $request->location,
            'review' => $request->review,
            'feature_image' => $imagePath,
        ]);
        return redirect()->route('Testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('testimonials/summernote', 'public');

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
        if (Gate::denies('edit-testimonials')) {
            abort(403, 'Unauthorized');
        }
        // Find the Story using the slug
        $testimonial = Testimonial::where('slug', $slug)->firstOrFail();
        // Return the edit view with the testimonial data
        return view('Testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        // Handle feature image upload and deletion
        if ($request->hasFile('feature_image')) {
            // Delete the old feature image if it exists
            if ($testimonial->feature_image) {
                $oldImagePath = 'public/' . $testimonial->feature_image; // Add 'public/' for correct deletion path
               // \Log::info('Attempting to delete: ' . $oldImagePath); // Log the path of the old image

                // Check if the old image file exists in storage
                if (Storage::exists($oldImagePath)) {
                    // Delete the old feature image
                    Storage::delete($oldImagePath);
                   // \Log::info('Old Image Deleted Successfully');
                } else {
                   // \Log::info('Old Image Not Found: ' . $oldImagePath);
                }
            }
            // Save the new feature image
            $image = $request->file('feature_image');
            $imagePath = $image->store('testimonials', 'public'); // Store the image correctly
            $testimonial->feature_image = str_replace('public/', '', $imagePath); // Store relative path in database (remove 'public/' part)
        }
        // Update the testimonial details
        $testimonial->name = $request->input('name');
        $testimonial->location = $request->input('location');
        $testimonial->review = $request->input('review');
        // Save the updated testimonial
        $testimonial->save();
        return redirect()->route('Testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-testimonials')) {
            abort(403, 'Unauthorized');
        }
        $testimonial = Testimonial::findOrFail($id);
        // Delete the image file if it exists
        if ($testimonial->feature_image) {
            $imagePath = storage_path('app/public/' . $testimonial->feature_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the testimonial record from the database
        $testimonial->delete();
        return redirect()->route('Testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
