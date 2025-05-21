@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Candidate Group') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('CandidateGroups.index') }}" class="btn btn-primary">{{ __('Back to Candidate Groups') }}</a>
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
                        <form action="{{ route('CandidateGroups.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="organization_id" value="{{ auth()->user()->organization_id }}"> <!-- Automatically assign organization_id -->
                            
                            <div class="card-body">
                                <!-- Candidate Group Name Field -->
                                <label for="name">{{ __('Candidate Group Name') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Enter Candidate Group Name') }}" value="{{ old('name') }}" required>
                                    @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Candidate Group Description Field -->
                                <label for="description">{{ __('Description') }}</label>
                                <div class="input-group mb-3">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Enter Description') }}">{{ old('description') }}</textarea>
                                    @error('description')
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
