<?php

namespace App\Http\Controllers;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $organizations = Organization::paginate(10); // Adjust the number of items per page as needed
        return view('Organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'site_address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'status' => 'in:pending,approved',
            'is_active' => 'boolean',
        ]);

        // Handle file upload for logo
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Organization::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'site_address' => $request->site_address,
            'logo' => $logoPath,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'status' => $request->status ?? 'pending',
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('Organizations.index')->with('success', 'Organization created successfully.');

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
    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organizations.edit', compact('organization'));
    }


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
            $organization->logo = $logoPath; // Directly store the path
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
        // Find the organization by ID
        $organization = Organization::findOrFail($id);

        // Delete the image file if it exists
        if ($organization->logo) {
            $imagePath = storage_path('app/public/' . $organization->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the organization from the database
        $organization->delete();

        // Redirect back with a success message
        return redirect()->route('Organizations.index')->with('success', 'Organization deleted successfully.');
    }


}
