@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Candidate') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Candidates.index') }}" class="btn btn-primary">{{ __('Back to Candidates') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('Candidates.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @foreach ([
                                    'first_name' => 'First Name',
                                    'last_name' => 'Last Name',
                                    'email' => 'Email',
                                    'username' => 'Username',
                                    'password' => 'Password',
                                    'mobile' => 'Mobile',
                                    'national_id' => 'National ID'
                                ] as $field => $label)
                                    <label for="{{ $field }}">{{ __($label) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="{{ $field == 'password' ? 'password' : 'text' }}" 
                                               name="{{ $field }}" id="{{ $field }}" 
                                               class="form-control @error($field) is-invalid @enderror" 
                                               placeholder="{{ __('Enter ' . $label) }}" 
                                               value="{{ old($field) }}" required>
                                        @error($field)
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endforeach

                                <label for="candidate_group">{{ __('Candidate Group') }}</label>
                                <div class="input-group mb-3">
                                    <select name="candidate_group" id="candidate_group" class="form-control @error('candidate_group') is-invalid @enderror">
                                        <option value="">{{ __('Select Candidate Group') }}</option>
                                        @foreach($candidateGroups as $group)
                                            <option value="{{ $group->id }}" {{ old('candidate_group') == $group->id ? 'selected' : '' }}>
                                                {{ $group->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('candidate_group')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                @foreach ([
                                    'special_needs' => ['disable' => 'Disable', 'enable' => 'Enable'],
                                    'status' => ['active' => 'Active', 'inactive' => 'Inactive']
                                ] as $field => $options)
                                    <label for="{{ $field }}">{{ __(ucwords(str_replace('_', ' ', $field))) }}</label>
                                    <div class="input-group mb-3">
                                        <select name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror">
                                            @foreach ($options as $key => $value)
                                                <option value="{{ $key }}" {{ old($field) == $key ? 'selected' : '' }}>{{ __($value) }}</option>
                                            @endforeach
                                        </select>
                                        @error($field)
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
