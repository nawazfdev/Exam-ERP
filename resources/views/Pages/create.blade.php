@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Create Page') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Pages.index') }}" class="btn btn-primary">{{ __('Back to Pages') }}</a>
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
                    <form action="{{ route('Pages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- Page Title Field -->
                            <label for="title">{{ __('Page Title') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Enter Page Title') }}" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Slug Field -->
                            <label for="slug">{{ __('Slug') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="slug" id="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    placeholder="{{ __('Enter Page Slug') }}" value="{{ old('slug') }}" required>
                                @error('slug')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <!-- Page Content Field -->
                            <label for="content">{{ __('Page Content') }}</label>
                            <div class="input-group mb-3">
                                <textarea name="content" id="summernote" rows="5"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="{{ __('Enter Page Content') }}"
                                    required>{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
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

                            <!-- Page Status Field -->
                            <label for="status">{{ __('Page Status') }}</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{ __('Active') }}
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{ __('Inactive') }}
                                    </option>
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
@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-lite.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250, 
            placeholder: 'Enter Page Content...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
        });

        function uploadImage(file) {
            var data = new FormData();
            data.append("image", file);
            data.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('Pages.uploadImage') }}",
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#summernote').summernote('insertImage', response.url);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
</script>
@endsection