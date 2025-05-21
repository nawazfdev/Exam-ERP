<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('show-blogcategories')) {
            abort(403, 'Unauthorized');
        }
        $blogcategories = BlogCategory::paginate(10);
        return view('BlogCategories.index', compact('blogcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Gate::denies('create-blogcategories')) {
            abort(403, 'Unauthorized');
        }
        return view('BlogCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('create-blogcategories')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
       $blogcategories = BlogCategory::updateOrCreate(
        ['name' => $input['name']], 
        $input
       );
        return redirect()->route('BlogCategories.index')->with('success', 'Blog Category created successfully.');
  
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
        if (Gate::denies('edit-blogcategories')) {
            abort(403, 'Unauthorized');
        }
        $blogcategories = BlogCategory::find($id);
        return view('BlogCategories.edit',compact('blogcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Gate::denies('edit-blogcategories')) {
            abort(403, 'Unauthorized');
        }
        $blogcategories = BlogCategory::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        $blogcategories->update($input);
        return redirect()->route('BlogCategories.index')->with('success', 'Category updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies('delete-blogcategories')) {
            abort(403, 'Unauthorized');
        }
        $blogcategories = Category::find($id);
        if ($blogcategories) 
        {
        $blogcategories->delete();
        }
        return redirect()->route('BlogCategories.index')->with('success', 'Category deleted successfully.');
    }
}
