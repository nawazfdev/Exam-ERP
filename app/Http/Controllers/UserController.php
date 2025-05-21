<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class UserController extends Controller
{
    public function index()
    {
        if (Gate::denies('show-users')) {
            abort(403, 'Unauthorized');
        }
        $users = User::paginate();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }
    public function profile($id)
    {
        $user = User::findOrFail($id);  // Retrieve user data by id
        return view('user.profile', compact('user'));  // Pass user data to the view
    }
    public function create()
    {
        if (Gate::denies('create-users')) {
            abort(403, 'Unauthorized');
        }
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roles' => 'required'
        ], [
            'email.unique' => 'The email address already exists.',
        ]);

        // Prepare data
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        // Create user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $input['password']
        ]);

        // Assign role
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }



    public function edit($id)
    {
        if (Gate::denies('edit-users')) {
            abort(403, 'Unauthorized');
        }
        $user = User::findOrFail($id);
        $roles = Role::all(); // Fetch all roles
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('edit-users')) {
            abort(403, 'Unauthorized');
        }

        $user = User::findOrFail($id); // Find user by ID

        // Validation rules
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'roles' => 'required|array',
        ], [
            'email.unique' => 'The email address already exists.',
            'roles.required' => 'At least one role must be selected.',
        ]);

        // Update user details
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Sync roles
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        if (Gate::denies('delete-users')) {
            abort(403, 'Unauthorized');
        }
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->back()->withSuccess('User deleted successfully');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'notes' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
