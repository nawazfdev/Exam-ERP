<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Gate::denies('show-industrycategories')) {
            abort(403, 'Unauthorized');
        }
        $categories = Category::paginate(10);
        return view('Categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('create-industrycategories')) {
            abort(403, 'Unauthorized');
        }
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the input
         $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        // Create and store the new category
        Category::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect()->route('Categories.index')->with('success', 'Category created successfully.');
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
        if (Gate::denies('edit-industrycategories')) {
            abort(403, 'Unauthorized');
        }
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255', 
            'status' => 'required|boolean',
        ]);
        // Find the category by its ID
        $category = Category::findOrFail($id);
        // Update the category's details
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        // Save the updated category
        $category->save();
        return redirect()->route('Categories.index')->with('success', 'Category updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies('delete-industrycategories')) {
            abort(403, 'Unauthorized');
        }
        $categories = Category::find($id);
        if ($categories) 
        {
        $categories->delete();
        }
        return redirect()->route('Categories.index')->with('success', 'Category deleted successfully.');
    }
}
