<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('show-sitesettings')) {
            abort(403, 'Unauthorized');
        }
        $siteSettings = SiteSetting::find(1);
        return view('SiteSettings.index', compact('siteSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Gate::denies('edit-sitesettings')) {
            abort(403, 'Unauthorized');
        }
        $siteSettings = SiteSetting::firstOrNew(['id' => 1]);
        $siteSettings->fill($request->all());
        if ($request->hasFile('new_primary_logo')) {
            $newPrimaryLogo = $request->file('new_primary_logo');
            $destinationPath = 'logos';
            $newPrimaryLogoPath = date('YmdHis') . "." . $newPrimaryLogo->getClientOriginalExtension();
            $newPrimaryLogo->storeAs($destinationPath, $newPrimaryLogoPath, 'public');
            $siteSettings->site_primary_logo = 'storage/' . $destinationPath . '/' . $newPrimaryLogoPath;
        }
        // Handle file upload for the new favicon
        if ($request->hasFile('new_favicon')) {
            $newFavicon = $request->file('new_favicon');
            $destinationPath = 'favicons'; // Change the destination path as needed
            $newFaviconPath = date('YmdHis') . "." . $newFavicon->getClientOriginalExtension();
            $newFavicon->storeAs($destinationPath, $newFaviconPath, 'public');
            $siteSettings->site_favicon = 'storage/' . $destinationPath . '/' . $newFaviconPath;
        }
        // Save the changes to the database
        $siteSettings->save();
        return redirect()->route('SiteSettings.index')
            ->with('success', 'Site settings updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
