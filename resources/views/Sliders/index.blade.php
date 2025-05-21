@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Sliders') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Sliders.create') }}" class="btn btn-primary">{{ __('Create Slider') }}</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Subtitle') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Button Text') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
    @if ($sliders->count() > 0)
        @foreach($sliders as $slider)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->description }}</td>
                <td>
                    @if ($slider->image_url)
                        <img src="{{ asset('storage/' . $slider->image_url) }}" alt="Slider Image"
                            width="50" height="50" />
                    @else
                        <p>No image available</p>
                    @endif
                </td>
                <td>{{ $slider->button_text }}</td>
                <td>
                    <a href="{{ route('Sliders.edit', $slider->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>

                    <!-- Delete Button -->
                    <form action="{{ route('Sliders.destroy', $slider->id) }}" method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('{{ __('Are you sure you want to delete this slider?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" class="text-center">{{ __('No sliders found') }}</td>
        </tr>
    @endif
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection