<?php
namespace App\Http\Controllers;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeSectionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Gate::denies('show-homesections')) {
            abort(403, 'Unauthorized');
        }
        $homesections = HomeSection::latest()->get();
        return view('HomeSections.index', compact('homesections'));
    }
    public function create()
    {
        //
        if (Gate::denies('create-homesections')) {
            abort(403, 'Unauthorized');
        }
        return view('HomeSections.create');
    }
    // Store a new section
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
        ]);
        // Create a new section
        HomeSection::create($request->all());
        return redirect()->route('HomeSections.index')->with('success', 'Section added successfully!');
    }
    public function edit($id)
    {
        if (Gate::denies('edit-homesections')) {
            abort(403, 'Unauthorized');
        }
        $homeSection = HomeSection::findOrFail($id);
        return view('HomeSections.edit', compact('homeSection'));
    }

    // Update Home Section
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $homeSection = HomeSection::findOrFail($id);
        $homeSection->update([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
        ]);
        return redirect()->route('HomeSections.index')->with('success', 'Home Section updated successfully.');
    }
    // Delete Home Section
    public function destroy($id)
    {
        if (Gate::denies('delete-homesections')) {
            abort(403, 'Unauthorized');
        }
        $homeSection = HomeSection::findOrFail($id);
        $homeSection->delete();
        return redirect()->route('HomeSections.index')->with('success', 'Home Section deleted successfully.');
    }

}
