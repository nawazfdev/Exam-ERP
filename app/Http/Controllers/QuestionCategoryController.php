<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Gate::denies('show-questioncategories')) {
        //     abort(403, 'Unauthorized');
        // }
        $questioncategories = QuestionCategory::paginate(10);
        return view('QuestionCategories.index', compact('questioncategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // if (Gate::denies('create-questioncategories')) {
        //     abort(403, 'Unauthorized');
        // }
        return view('QuestionCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if (Gate::denies('create-questioncategories')) {
        //     abort(403, 'Unauthorized');
        // }
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        // Add the authenticated user's organization_id
        $input['organization_id'] = auth()->user()->organization_id;

        // Create or update the QuestionCategory
        $questioncategories = QuestionCategory::updateOrCreate(
            [
                'name' => $input['name'],
                'organization_id' => $input['organization_id'] // Ensure uniqueness per organization
            ],
            $input
        );
        return redirect()->route('QuestionCategories.index')->with('success', 'Question Category created successfully.');

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
        // if (Gate::denies('edit-questioncategories')) {
        //     abort(403, 'Unauthorized');
        // }
        $questioncategories = QuestionCategory::find($id);
        return view('QuestionCategories.edit', compact('questioncategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the category, ensuring it belongs to the authenticated user's organization
        $questioncategories = QuestionCategory::where('id', $id)
            ->where('organization_id', auth()->user()->organization_id)
            ->firstOrFail();

        // Validate input
        $request->validate([
            'name' => 'required',
        ]);

        // Update the category
        $questioncategories->update([
            'name' => $request->name,
        ]);

        return redirect()->route('QuestionCategories.index')->with('success', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    // Removed the edit method as requested

    public function destroy(string $id)
    {
        // if (Gate::denies('delete-blogcategories')) {
        //     abort(403, 'Unauthorized');
        // }
        $questioncategories = QuestionCategory::find($id);
        if ($questioncategories) {
            $questioncategories->delete();
        }
        return redirect()->route('QuestionCategories.index')->with('success', 'Category deleted successfully.');
    }

}
