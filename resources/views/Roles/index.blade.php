@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Role') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Role Management
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                           <div style="padding-right: 10px;padding-top: 10px;float:right;">
                                <a href="{{route('Roles.create')}}" class="btn btn-primary">Create Role</a>
                            </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th style="width:20%;">SNO#</th>
                                        <th style="width:30%;">Name</th>
                                        <th style="width:30%;">Permissions</th>
                                        <th style="width:20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key=>$role)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>      
                                        <td> 
                                            @foreach ($role->permissions->groupBy('group_name') as $groupName => $groupPermissions)
                                            <label>{{ $groupName }}</label>
                                               @foreach ($groupPermissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" name="permission[]" class="form-check-input" value="{{ $permission->id }}" checked disabled>
                                                    <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
                                                </div>
                                                @endforeach
                                            @endforeach
                                            
                                        </td>    
                                        <td>
                                            <a href="{{ route('Roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('Roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Role?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $roles->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection