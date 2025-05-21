{{-- edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Candidate Group') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('CandidateGroups.index') }}" class="btn btn-primary">{{ __('Back to Candidate Groups') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('CandidateGroups.update', $group->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <label for="name">{{ __('Group Name') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $group->name) }}" required>
                                    @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <label for="description">{{ __('Description') }}</label>
                                <div class="input-group mb-3">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $group->description) }}</textarea>
                                    @error('description')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
