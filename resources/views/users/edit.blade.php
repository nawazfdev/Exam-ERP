@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit User') }}</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('User Details') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="first_name">{{ __('First Name') }}</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                        value="{{ old('first_name', $user->first_name) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                        value="{{ old('last_name', $user->last_name) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        placeholder="Leave blank to keep current password">
                                </div>

                                <div class="form-group">
                                    <label for="roles">Roles</label>
                                    <br>
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]"
                                                id="role{{ $role->id }}" value="{{ $role->id }}"
                                                @if($user->roles->contains($role->id)) checked @endif>
                                            <label class="form-check-label" for="role{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Update User') }}</button>
                                </div>

                            </form>
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