@extends('layouts.app')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Create Testimonial') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Testimonials.index') }}" class="btn btn-primary">{{ __('Back to Testimonials') }}</a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ route('Testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- Name Field -->
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Location Field -->
                            <label for="location">{{ __('Location') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="location" id="location"
                                    class="form-control @error('location') is-invalid @enderror"
                                    placeholder="{{ __('Enter Location') }}" value="{{ old('location') }}" required>
                                @error('location')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Review Field -->
                            <label for="review">{{ __('Review') }}</label>
                            <div class="input-group mb-3">
                                <textarea id="review" name="review" class="form-control @error('review') is-invalid @enderror" placeholder="Enter Review" required>{{ old('review') }}</textarea>
                                @error('review')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Feature Image Field -->
                            <label for="feature_image">{{ __('Feature Image') }}</label>
                            <div class="input-group mb-3">
                                <input type="file" name="feature_image" id="feature_image"
                                    class="form-control @error('feature_image') is-invalid @enderror" required>
                                @error('feature_image')
                                    <span class="error invalid-feedback">{{ $message }}</span>
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
    </div>
</div>
@endsection
