<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use App\Models\AboutUsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('show-aboutus')) {
            abort(403, 'Unauthorized');
        }
        $aboutUs = AboutUs::with('items')->paginate(10);
        return view('AboutUs.index', compact('aboutUs'));
    }


    public function create()
    {
        if (Gate::denies('create-aboutus')) {
            abort(403, 'Unauthorized');
        }
        return view('AboutUs.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create-aboutus')) {
            abort(403, 'Unauthorized');
        }
        // Check if there is already an AboutUs record
        if (AboutUs::count() > 0) {
            return redirect()->route('AboutUs.index')->with('error', 'Only one About Us section is allowed.');
        }
        // Validate the incoming data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'feature_image' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff|max:10240', // max 10MB
        ]);
        // Handle the feature image upload
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $imagePath = $request->file('feature_image')->store('about_us_images', 'public'); // Stores in public/about_us_images
        }
        // Create the AboutUs record
        $aboutUs = AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'feature_image' => $imagePath, // Store the image path
        ]);

        // Create the associated items for the About Us section
        foreach ($request->items as $item) {
            AboutUsItem::create([
                'about_us_id' => $aboutUs->id,
                'heading' => $item['heading'],
                'content' => $item['content'],
            ]);
        }
        // Redirect with success message
        return redirect()->route('AboutUs.index')->with('success', 'About Us section created successfully.');
    }

    public function edit($id)
    {
        if (Gate::denies('edit-aboutus')) {
            abort(403, 'Unauthorized');
        }
        $aboutUs = AboutUs::findOrFail($id);
        // Get the associated items
        $items = $aboutUs->items;
        // Return the edit view with the retrieved aboutUs model
        return view('AboutUs.edit', compact('aboutUs', 'items'));
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('edit-aboutus')) {
            abort(403, 'Unauthorized');
        }
        // Find the AboutUs record by the provided id
        $aboutUs = AboutUs::findOrFail($id);
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'items' => 'required|array',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image
        ]);
        // Update the About Us record
        $aboutUs->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        // Handle feature image upload
        if ($request->hasFile('feature_image')) {
            // Store the image in the 'about_us' directory under 'public'
            $imagePath = $request->file('feature_image')->store('about_us', 'public');
            // Update the feature image in the AboutUs record
            $aboutUs->update([
                'feature_image' => $imagePath, 
            ]);
        }
        // Loop through the request items to update or create them
        foreach ($request->items as $item) {
            if (isset($item['id']) && !empty($item['id'])) {
                // If an ID is set, update the existing item
                $aboutUsItem = AboutUsItem::find($item['id']);
                if ($aboutUsItem) {
                    $aboutUsItem->update([
                        'heading' => $item['heading'],
                        'content' => $item['content'],
                    ]);
                }
            } else {
                // Otherwise, create a new item (if it's not a duplicate)
                $existingItem = $aboutUs->items()->where('heading', $item['heading'])->first();

                if (!$existingItem) {
                    $aboutUs->items()->create([
                        'heading' => $item['heading'],
                        'content' => $item['content'],
                    ]);
                }
            }
        }
        return redirect()->route('AboutUs.index')->with('success', 'About Us section updated successfully.');
    }

    public function destroy($id)
    {
        if (Gate::denies('delete-aboutus')) {
            abort(403, 'Unauthorized');
        }
        // Find the AboutUs record by id
        $aboutUs = AboutUs::findOrFail($id);
        // Delete the record
        $aboutUs->delete();
        // Redirect back with a success message
        return redirect()->route('AboutUs.index')->with('success', 'About Us deleted successfully.');
    }

}
