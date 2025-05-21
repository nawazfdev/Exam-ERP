@extends('layouts.app')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Create Blog Post') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('BlogPosts.index') }}" class="btn btn-primary">{{ __('Back to Blog Posts') }}</a>
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
                    <form action="{{ route('BlogPosts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- Blog Category Selection -->
                            <label for="blogcategory_id">{{ __('Category') }}</label>
                            <select class="form-control @error('blogcategory_id') is-invalid @enderror"
                                id="blogcategory_id" name="blogcategory_id" required>
                                <option value="">{{ __('Select a Category') }}</option>
                                @foreach($blogcategories as $blogcategory)
                                    <option value="{{ $blogcategory->id }}" {{ old('blogcategory_id') == $blogcategory->id ? 'selected' : '' }}>
                                        {{ $blogcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('blogcategory_id')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                            <!-- Blog Post Title Field -->
                            <label for="title">{{ __('Blog Post Title') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Enter Blog Post Title') }}" value="{{ old('title') }}" required>
                                @error('title')
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

                            <!-- Description Field with Summernote -->
                            <label for="description">{{ __('Blog Post Description') }}</label>
                            <div class="input-group mb-3">
                                <textarea id="summernote" name="description"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
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

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-lite.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 250,
            placeholder: 'Enter Blog Post Description...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function (files) {
                    uploadImage(files[0]);
                }
            }
        });

        function uploadImage(file) {
            var data = new FormData();
            data.append("image", file);
            data.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('BlogPosts.uploadImage') }}",
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#summernote').summernote('insertImage', response.url);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
</script>
@endsection