<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\CandidateGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CandidateController extends Controller
{
    //
    public function index()
    {
        $candidates = Candidate::with('group', 'createdBy')->paginate(10);
        return view('Candidates.index', compact('candidates'));
    }

    public function create()
    {
        $candidateGroups = CandidateGroup::all();
        $users = User::all();
        return view('Candidates.create', compact('candidateGroups', 'users'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'username' => 'required|string|max:255|unique:candidates,username',
            'password' => 'required|string|min:6',
            'candidate_group' => 'required|exists:candidate_groups,id',
            'mobile' => 'required|digits_between:10,15',
            'national_id' => 'required|digits_between:10,20|unique:candidates,national_id',
            'special_needs' => 'required|in:disable,enable',
            'status' => 'required|in:active,inactive',
        ]);

        Candidate::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'candidate_group_id' => $request->candidate_group,
            'mobile' => $request->mobile,
            'national_id' => $request->national_id,
            'special_needs' => $request->special_needs,
            'status' => $request->status,
            'created_by' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
        ]);

        return redirect()->route('Candidates.index')->with('success', 'Candidate created successfully!');
    }



    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);  // Find candidate by ID
        $candidateGroups = CandidateGroup::all(); // Assuming you have a CandidateGroup model for the dropdown

        return view('candidates.edit', compact('candidate', 'candidateGroups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email,' . $id,
            'username' => 'required|string|max:255|unique:candidates,username,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'candidate_group' => 'required|exists:candidate_groups,id',
            'mobile' => 'nullable|numeric',
            'national_id' => 'nullable|numeric',
            'special_needs' => 'required|in:enable,disable',
            'status' => 'required|in:active,inactive',
        ]);

        $candidate = Candidate::findOrFail($id);  // Find candidate by ID
        $candidate->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $candidate->password, // If password is empty, keep the existing one
            'candidate_group' => $request->candidate_group,
            'mobile' => $request->mobile,
            'national_id' => $request->national_id,
            'special_needs' => $request->special_needs,
            'status' => $request->status,
        ]);

        return redirect()->route('Candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);  // Find candidate by ID
        $candidate->delete();

        return redirect()->route('Candidates.index')->with('success', 'Candidate deleted successfully.');
    }

}
