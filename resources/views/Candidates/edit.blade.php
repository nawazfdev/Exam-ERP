@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Candidate') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Candidates.index') }}" class="btn btn-primary">{{ __('Back to Candidates') }}</a>
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
                        <form action="{{ route('Candidates.update', $candidate->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- Candidate First Name Field -->
                                <label for="first_name">{{ __('First Name') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="first_name" id="first_name"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           placeholder="{{ __('Enter First Name') }}" value="{{ old('first_name', $candidate->first_name) }}" required>
                                    @error('first_name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Last Name Field -->
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="last_name" id="last_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="{{ __('Enter Last Name') }}" value="{{ old('last_name', $candidate->last_name) }}" required>
                                    @error('last_name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Email Field -->
                                <label for="email">{{ __('Email') }}</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Enter Email') }}" value="{{ old('email', $candidate->email) }}" required>
                                    @error('email')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Username Field -->
                                <label for="username">{{ __('Username') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" id="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           placeholder="{{ __('Enter Username') }}" value="{{ old('username', $candidate->username) }}" required>
                                    @error('username')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Password Field -->
                                <label for="password">{{ __('Password') }}</label>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('Enter Password') }}">
                                    @error('password')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Group Field -->
                                <label for="candidate_group">{{ __('Candidate Group') }}</label>
                                <div class="input-group mb-3">
                                    <select name="candidate_group" id="candidate_group" class="form-control @error('candidate_group') is-invalid @enderror">
                                        <option value="">{{ __('Select Candidate Group') }}</option>
                                        @foreach($candidateGroups as $group)
                                            <option value="{{ $group->id }}" {{ old('candidate_group', $candidate->candidate_group) == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('candidate_group')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Mobile Field -->
                                <label for="mobile">{{ __('Mobile') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="mobile" id="mobile"
                                           class="form-control @error('mobile') is-invalid @enderror"
                                           placeholder="{{ __('Enter Mobile') }}" value="{{ old('mobile', $candidate->mobile) }}">
                                    @error('mobile')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate National ID Field -->
                                <label for="national_id">{{ __('National ID') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="national_id" id="national_id"
                                           class="form-control @error('national_id') is-invalid @enderror"
                                           placeholder="{{ __('Enter National ID') }}" value="{{ old('national_id', $candidate->national_id) }}">
                                    @error('national_id')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Special Needs Field -->
                                <label for="special_needs">{{ __('Special Needs') }}</label>
                                <div class="input-group mb-3">
                                    <select name="special_needs" id="special_needs" class="form-control @error('special_needs') is-invalid @enderror">
                                        <option value="disable" {{ old('special_needs', $candidate->special_needs) == 'disable' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                        <option value="enable" {{ old('special_needs', $candidate->special_needs) == 'enable' ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                    </select>
                                    @error('special_needs')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Status Field -->
                                <label for="status">{{ __('Status') }}</label>
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="active" {{ old('status', $candidate->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status', $candidate->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
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
