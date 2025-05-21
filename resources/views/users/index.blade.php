@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
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
                        Users List
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                           <div style="padding-right: 10px;padding-top: 10px;float:right;">
                                <a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>
                            </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th style="width:10%;">SNO#</th>
                                        <th style="width:15%;">Name</th>
                                        <th style="width:30%;">Email</th>
                                        <th style="width:25%;">Role</th>
                                        <th style="width:20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=>$user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                        @foreach ($roles as $role)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="roles[]" id="role{{ $role->id }}" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked @endif disabled>
                                                <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $users->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection