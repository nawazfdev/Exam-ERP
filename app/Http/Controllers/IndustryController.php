<?php

namespace App\Http\Controllers;
use App\Models\Industry;
use App\Models\IndustryCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('show-industries')) {
            abort(403, 'Unauthorized');
        }
        $industries = Industry::latest()->get();
        return view('Industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('create-industries')) {
            abort(403, 'Unauthorized');
        }
        $industrycategories = IndustryCategory::all();
        return view('Industries.create', compact('industrycategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required|string|max:255',
            'industrycategory_id' => 'required',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
        // Handle feature image upload
        $imagePath = null;
        if ($request->hasFile('feature_image')) {
            $imagePath = $request->file('feature_image')->store('industries', 'public');
        }
        // Save investor
        Industry::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'feature_image' => $imagePath,
            'industrycategory_id' => $request->industrycategory_id,
            'description' => $request->description,
        ]);
        return redirect()->route('Industries.index')->with('success', 'Industry created successfully.');
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('Industries/summernote', 'public');

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
        if (Gate::denies('edit-industries')) {
            abort(403, 'Unauthorized');
        }
        // Find the Industry using the slug
        $industry = Industry::where('slug', $slug)->firstOrFail();
        $industrycategories = IndustryCategory::all();
        // Return the edit view with the Industry data
        return view('Industries.edit', compact('industry', 'industrycategories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'site_address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,approved',
            'is_active' => 'required|boolean',
        ]);

        // Fetch the organization from the database
        $organization = Organization::findOrFail($id);

        // Update the organization's details with validated data
        $organization->name = $validated['name'];
        $organization->site_address = $validated['site_address'];
        $organization->email = $validated['email'];
        $organization->phone = $validated['phone'];
        $organization->description = $validated['description'];
        $organization->status = $validated['status'];
        $organization->is_active = $validated['is_active'];

        // Handle logo file upload if present
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($organization->logo && Storage::exists('public/' . $organization->logo)) {
                Storage::delete('public/' . $organization->logo);
            }

            // Store the new logo and update the logo path in the database
            $logoPath = $request->file('logo')->store('logos', 'public');
            $organization->logo = $logoPath;
        }

        // Save the updated organization data
        $organization->save();

        // Redirect back to the organizations list with a success message
        return redirect()->route('Organizations.index')
            ->with('success', 'Organization updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-industries')) {
            abort(403, 'Unauthorized');
        }
        $industry = Industry::findOrFail($id);
        // Delete the image file if it exists
        if ($industry->feature_image) {
            $imagePath = storage_path('app/public/' . $industry->feature_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the industry record from the database
        $industry->delete();
        return redirect()->route('Industries.index')->with('success', 'Industry deleted successfully');
    }

}
