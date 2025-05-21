<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CandidateGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Gate::denies('view-candidate-groups')) {
        //     abort(403, 'Unauthorized');
        // }

        $groups = CandidateGroup::paginate(10);
        return view('CandidateGroups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (Gate::denies('create-candidate-groups')) {
        //     abort(403, 'Unauthorized');
        // }

        return view('CandidateGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd(auth()->user()->organization_id);
       // dd($request->all());
        // if (Gate::denies('create-candidate-groups')) {
        //     abort(403, 'Unauthorized');
        // }

        $request->validate([
            'name' => 'required|unique:candidate_groups,name',
            'description' => 'nullable|string',
        ]);

        CandidateGroup::create([
            'organization_id' => auth()->user()->organization_id, // Automatically assign organization
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('CandidateGroups.index')->with('success', 'Candidate Group created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // if (Gate::denies('edit-candidate-groups')) {
        //     abort(403, 'Unauthorized');
        // }

        $group = CandidateGroup::findOrFail($id);
        return view('CandidateGroups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // if (Gate::denies('edit-candidate-groups')) {
        //     abort(403, 'Unauthorized');
        // }

        $group = CandidateGroup::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:candidate_groups,name,' . $id . '|max:255',
            'description' => 'nullable|string',
        ]);

        $group->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('CandidateGroups.index')->with('success', 'Candidate Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // if (Gate::denies('delete-candidate-groups')) {
        //     abort(403, 'Unauthorized');
        // }

        $group = CandidateGroup::findOrFail($id);
        $group->delete();

        return redirect()->route('CandidateGroups.index')->with('success', 'Candidate Group deleted successfully.');
    }
}
