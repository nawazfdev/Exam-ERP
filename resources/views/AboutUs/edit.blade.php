@extends('layouts.app')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Edit About Us') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('AboutUs.index') }}" class="btn btn-primary">{{ __('Back to About Us') }}</a>
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
                    <form action="{{ route('AboutUs.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- Title Field -->
                            <label for="title">{{ __('Title') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Enter Title') }}" value="{{ old('title', $aboutUs->title) }}"
                                    required>
                                @error('title')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description Field with Summernote -->
                            <label for="description">{{ __('Description') }}</label>
                            <div class="input-group mb-3">
                                <textarea id="summernote" name="description"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $aboutUs->description) }}</textarea>
                                @error('description')
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
                            @if($aboutUs->feature_image)
                                <img src="{{ asset('storage/' . $aboutUs->feature_image) }}" alt="Feature Image"
                                    class="img-thumbnail" width="150">
                            @endif
                            <br>
                            <h4>{{ __('Sections') }}</h4>
                            <div id="items">
                                @foreach ($aboutUs->items as $index => $item)
                                    <div class="mb-3">
                                        <input type="hidden" name="items[{{ $index }}][id]"
                                            value="{{ old('items.' . $index . '.id', $item->id) }}">

                                        <label for="heading">{{ __('Heading') }}</label>
                                        <input type="text" name="items[{{ $index }}][heading]" class="form-control"
                                            value="{{ old('items.' . $index . '.heading', $item->heading) }}" required>

                                        <label for="content">{{ __('Content') }}</label>
                                        <textarea name="items[{{ $index }}][content]" class="form-control summernote"
                                            required>{{ old('items.' . $index . '.content', $item->content) }}</textarea>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-secondary"
                                onclick="addSection()">{{ __('Add Section') }}</button>
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
        // Initialize Summernote
        $('.summernote').summernote({
            height: 150,
            placeholder: 'Enter Content...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#summernote').summernote({
            height: 250,
            placeholder: 'Enter About Us Description...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

    let index = {{ count($aboutUs->items) }};
    function addSection() {
        let html = `
            <div class="mb-3">
                <label>{{ __('Heading') }}</label>
                <input type="text" name="items[${index}][heading]" class="form-control" required>
                <label>{{ __('Content') }}</label>
                <textarea name="items[${index}][content]" class="form-control summernote" required></textarea>
            </div>`;
        $('#items').append(html);
        $('.summernote').summernote({
            height: 150,
            placeholder: 'Enter Content...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        index++;
    }
</script>
@endsection