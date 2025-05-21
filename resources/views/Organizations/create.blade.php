@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Organization') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Organizations.index') }}" class="btn btn-primary">{{ __('Back to Organizations') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('Organizations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- Organization Name Field -->
                                <label for="name">{{ __('Organization Name') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Enter Organization Name') }}" value="{{ old('name') }}" required>
                                    @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Site Address Field -->
                                <label for="site_address">{{ __('Site Address') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="site_address" id="site_address"
                                           class="form-control @error('site_address') is-invalid @enderror"
                                           placeholder="{{ __('Enter Site Address') }}" value="{{ old('site_address') }}">
                                    @error('site_address')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Logo Field -->
                                <label for="logo">{{ __('Logo') }}</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
                                    @error('logo')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <label for="email">{{ __('Email') }}</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Enter Email') }}" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Phone Field -->
                                <label for="phone">{{ __('Phone') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="phone" id="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           placeholder="{{ __('Enter Phone') }}" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Description Field -->
                                <label for="description">{{ __('Description') }}</label>
                                <div class="input-group mb-3">
                                    <textarea name="description" id="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              placeholder="{{ __('Enter Description') }}">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Status Field -->
                                <label for="status">{{ __('Status') }}</label>
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>{{ __('Approved') }}</option>
                                    </select>
                                    @error('status')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Active Field -->
                                <label for="is_active">{{ __('Is Active') }}</label>
                                <div class="input-group mb-3">
                                    <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('is_active')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
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
