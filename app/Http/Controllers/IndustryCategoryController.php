<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndustryCategory;
class IndustryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industrycategories = IndustryCategory::paginate(10);
        return view('IndustryCategories.index', compact('industrycategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('IndustryCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        //dd($input);
       $industrycategories = IndustryCategory::updateOrCreate(
        ['name' => $input['name']], 
        $input
       );
        return redirect()->route('IndustryCategories.index')->with('success', 'Industry Category created successfully.');
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
        $industrycategories = IndustryCategory::find($id);
        return view('IndustryCategories.edit',compact('industrycategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $industrycategories = IndustryCategory::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        $industrycategories->update($input);
        return redirect()->route('IndustryCategories.index')->with('success', 'Industry Category updated successfully.'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $industrycategories = IndustryCategory::find($id);
        if ($industrycategories) 
        {
        $industrycategories->delete();
        }
        return redirect()->route('IndustryCategories.index')->with('success', 'Industry Category deleted successfully.');
    }
}
