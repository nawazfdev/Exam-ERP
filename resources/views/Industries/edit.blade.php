@extends('layouts.app')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Edit Industry') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Industries.index') }}" class="btn btn-primary">{{ __('Back to Industries') }}</a>
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
                    <form action="{{ route('Industries.update', $industry->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Required for updating -->
                        <div class="card-body">
                            <!-- Industry Category Selection -->
                            <label for="industrycategory_id">{{ __('Industry Category') }}</label>
                            <div class="input-group mb-3">
                                <select name="industrycategory_id" id="industrycategory_id"
                                    class="form-control @error('industrycategory_id') is-invalid @enderror" required>
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach($industrycategories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ $industry->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Industry Title Field -->
                            <label for="title">{{ __('Industry Title') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Enter Industry Title') }}"
                                    value="{{ old('title', $industry->title) }}" required>
                                @error('title')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Feature Image Field -->
                            <label for="feature_image">{{ __('Feature Image') }}</label>
                            <div class="input-group mb-3">
                                <input type="file" name="feature_image" id="feature_image"
                                    class="form-control @error('feature_image') is-invalid @enderror">
                                @error('feature_image')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Show Existing Image -->
                            @if($industry->feature_image)
                                <img src="{{ asset('storage/' . $industry->feature_image) }}" alt="Feature Image"
                                    class="img-thumbnail" width="150">
                            @endif
<br>
                            <!-- Description Field with Summernote -->
                            <label for="description">{{ __('Industry Description') }}</label>
                            <div class="input-group mb-3">
                                <textarea id="summernote" name="description"
                                    class="form-control @error('description') is-invalid @enderror">
                                    {{ old('description', $industry->description) }}
                                </textarea>
                                @error('description')
                                    <span class="error invalid-feedback">{{ $message }}</span>
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
            placeholder: 'Enter Investor Description...',
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
                url: "{{ route('Investors.uploadImage') }}",
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