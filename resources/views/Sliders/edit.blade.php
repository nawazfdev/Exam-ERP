@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Edit Slider') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Sliders.index') }}" class="btn btn-primary">{{ __('Back to Sliders') }}</a>
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
                    <!-- Update form -->
                    <form action="{{ route('Sliders.update', $slider->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <!-- Title Field -->
                            <label for="title">{{ __('Title') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Enter Slider Title') }}"
                                    value="{{ old('title', $slider->title) }}" required>
                                @error('title')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Subtitle Field -->
                            <label for="subtitle">{{ __('Subtitle') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="subtitle" id="subtitle"
                                    class="form-control @error('subtitle') is-invalid @enderror"
                                    placeholder="{{ __('Enter Slider Subtitle') }}"
                                    value="{{ old('subtitle', $slider->subtitle) }}">
                                @error('subtitle')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <label for="description">{{ __('Description') }}</label>
                            <div class="input-group mb-3">
                                <textarea name="description" id="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="{{ __('Enter Slider Description') }}">{{ old('description', $slider->description) }}</textarea>
                                @error('description')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Image File Upload -->
                            <label for="image">{{ __('Slider Image') }}</label>
                            <div class="input-group mb-3">
                                <!-- File Upload Input -->
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror">
                            </div>

                            <!-- Display the Current Image if it Exists -->
                            @if ($slider->image_url)
                                <div class="mt-2">
                                    <label>{{ __('Current Image:') }}</label>
                                    <div class="current-image-preview">
                                        <img src="{{ asset('storage/' . $slider->image_url) }}" alt="Current Image"
                                            width="150">
                                    </div>
                                </div>
                            @endif

                            @error('image')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror


                            <!-- Button Text Field -->
                            <label for="button_text">{{ __('Button Text') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="button_text" id="button_text"
                                    class="form-control @error('button_text') is-invalid @enderror"
                                    placeholder="{{ __('Enter Button Text') }}"
                                    value="{{ old('button_text', $slider->button_text) }}">
                                @error('button_text')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Button URL Field -->
                            <label for="button_url">{{ __('Button URL') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="button_url" id="button_url"
                                    class="form-control @error('button_url') is-invalid @enderror"
                                    placeholder="{{ __('Enter Button URL') }}"
                                    value="{{ old('button_url', $slider->button_url) }}">
                                @error('button_url')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Form Slide Checkbox -->
                            <!-- <label for="is_form_slide">{{ __('Is Form Slide?') }}</label> -->
                            <!-- <div class="input-group mb-3">
                                Add the value of 'is_form_slide' using old() and the default value -->
                                <!-- <input type="checkbox" name="is_form_slide" id="is_form_slide" value="1" {{ old('is_form_slide', $slider->is_form_slide) ? 'checked' : '' }}> -->
                            <!-- </div>
                             @error('is_form_slide')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror -->

                        </div>

                        <div class="card-footer" style="background-color: white;">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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