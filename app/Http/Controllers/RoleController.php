<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middlewares\PermissionMiddleware;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Gate::denies('show-roles')) {
            abort(403, 'Unauthorized');
        }
        $roles = Role::paginate(10); // Fetch all roles from the role table
        $permissions = Permission::all();
        
        return view('Roles.index', compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('create-roles')) {
            abort(403, 'Unauthorized');
        }
        $permissions = Permission::all();
        return view('Roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->input('name'),'guard_name' => $request->guard_name]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('Roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        if (Gate::denies('edit-roles')) {
            abort(403, 'Unauthorized');
        }
        $role  = Role::find($id);
        $permissions = Permission::all();
        return view('Roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        if (Gate::denies('edit-roles')) {
            abort(403, 'Unauthorized');
        }
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();
        if ($request->has('permission')) {
            $permissions = Permission::whereIn('id', $request->input('permission'))->get();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }
    
        return redirect()->route('Roles.index')->with('success', 'Role updated successfully.');
    
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies('delete-roles')) {
            abort(403, 'Unauthorized');
        }
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('Roles.index')->with('success', 'Role deleted successfully.');
 
    }
}
