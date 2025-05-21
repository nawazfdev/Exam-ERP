@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create New User') }}</h1>
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
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="userForm">
                            @csrf
                            <div class="card-body">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="first_name" placeholder="{{ __('First Name') }}"
                                        class="form-control" required>
                                    <input type="text" name="last_name" placeholder="{{ __('Last Name') }}"
                                        class="form-control" required>
                                </div>

                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" placeholder="{{ __('Email') }}"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" placeholder="{{ __('Password') }}"
                                        class="form-control" required>
                                </div>
                                {{-- <label for="role">Role</label>
                                <select required name="roles[]" id="role" class="form-control">
                                    <option value="" disabled selected>Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select> --}}
                                <div class="form-group">
                                    <label for="roles">Roles</label>
                                    <br>
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]"
                                                id="role{{ $role->id }}" value="{{ $role->id }}">
                                            <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection