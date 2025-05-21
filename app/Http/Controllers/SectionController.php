<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function index()
    {
        $sections = Section::where('organization_id', auth()->user()->organization_id)->paginate(10);
        return view('Sections.index', compact('sections'));
    }
    public function create()
    {
        return view('Sections.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'organization_id' => auth()->user()->organization_id,
        ]);

        return redirect()->route('Sections.index')->with('success', 'Section created successfully.');
    }
    public function show($id)
    {
        $section = Section::where('organization_id', auth()->user()->organization_id)->findOrFail($id);
        return view('Sections.show', compact('section'));
    }
    public function edit($id)
    {
        $section = Section::where('organization_id', auth()->user()->organization_id)->findOrFail($id);
        return view('Sections.edit', compact('section'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $section = Section::where('organization_id', auth()->user()->organization_id)->findOrFail($id);
        $section->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('Sections.index')->with('success', 'Section updated successfully.');
    }
    public function destroy($id)
    {
        $section = Section::where('organization_id', auth()->user()->organization_id)->findOrFail($id);
        $section->delete();

        return redirect()->route('Sections.index')->with('success', 'Section deleted successfully.');
    }

}
