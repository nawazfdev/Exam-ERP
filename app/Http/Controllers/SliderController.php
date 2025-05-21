<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class SliderController extends Controller
{
    /**
     * Display a listing of the sliders.
     */
    public function index()
    {
        if (Gate::denies('show-sliders')) {
            abort(403, 'Unauthorized');
        }
        $sliders = Slider::paginate(10);
        return view('Sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        if (Gate::denies('create-sliders')) {
            abort(403, 'Unauthorized');
        }
        return view('Sliders.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs including the image file
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensures the file is an image
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|string',
            'is_form_slide' => 'nullable|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image in the public directory under the 'sliders' folder
            $imagePath = $request->file('image')->store('sliders', 'public');
        } else {
            return back()->withErrors(['image' => 'Please upload a valid image.']);
        }

        // Create a new slider record in the database
        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image_url' => $imagePath, // Store the image path
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'is_form_slide' => $request->has('is_form_slide') ? 1 : 0, // Check if checkbox is checked
        ]);

        // Redirect back to the sliders index with a success message
        return redirect()->route('Sliders.index')->with('success', 'Slider created successfully!');

    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit($id)
    {
        if (Gate::denies('edit-sliders')) {
            abort(403, 'Unauthorized');
        }
        $slider = Slider::findOrFail($id);
        return view('Sliders.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, $id)
    {
        
        $slider = Slider::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string|url',
            'is_form_slide' => 'nullable|boolean',
        ]);

        // Update the slider's other fields
        $slider->title = $validated['title'];
        $slider->subtitle = $validated['subtitle'];
        $slider->description = $validated['description'];
        $slider->button_text = $validated['button_text'];
        $slider->button_url = $validated['button_url'];

        // Handle 'is_form_slide' field when not present
        $slider->is_form_slide = $request->has('is_form_slide') ? true : false;

        // Handle image upload only if a new image is provided
        if ($request->hasFile('image')) {
            // Validate the uploaded image (optional, depending on your needs)
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // You can adjust validation here
            ]);

            // Store the new image and get its path
            $image = $request->file('image');
            $imagePath = $image->store('sliders', 'public');  // Store the image in the 'public' disk
            $slider->image_url = $imagePath;  // Update the image_url with the new image path
        }

        // Save the updated slider to the database
        $slider->save();

        // Redirect to the sliders index with a success message
        return redirect()->route('Sliders.index')->with('success', 'Slider updated successfully');
    }



    /**
     * Remove the specified slider from storage.
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-sliders')) {
            abort(403, 'Unauthorized');
        }
        $slider = Slider::findOrFail($id);
        if ($slider->image_url) {
            Storage::delete('public/' . $slider->image_url);
        }
        $slider->delete();

        return redirect()->route('Sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
