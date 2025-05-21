@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Testimonials List') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Testimonials.create') }}" class="btn btn-primary">{{ __('Create Testimonial') }}</a>
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
                    <div class="card-header">
                        <h3 class="card-title">List of Testimonials</h3>
                    </div>
                    <div class="card-body">
                        @if ($testimonials->count() > 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Feature Image</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Review</th>
                                        <th style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $key => $testimonial)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if($testimonial->feature_image)
                                                    <img src="{{ asset('storage/' . $testimonial->feature_image) }}" alt="Testimonial Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->location }}</td>
                                            <td>
                                                <span class="short-desc-{{ $testimonial->id }}">
                                                    {!! Str::limit(strip_tags($testimonial->review), 300, '...') !!}
                                                    <a href="#" onclick="toggleDescription({{ $testimonial->id }})">Read More</a>
                                                </span>
                                                <span class="full-desc-{{ $testimonial->id }}" style="display: none;">
                                                    {!! $testimonial->review !!}
                                                    <a href="#" onclick="toggleDescription({{ $testimonial->id }})">Read Less</a>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('Testimonials.edit', $testimonial->slug) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('Testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No testimonials found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<script>
    function toggleDescription(id) {
        let shortDesc = document.querySelector('.short-desc-' + id);
        let fullDesc = document.querySelector('.full-desc-' + id);
        if (shortDesc.style.display === 'none') {
            shortDesc.style.display = 'inline';
            fullDesc.style.display = 'none';
        } else {
            shortDesc.style.display = 'none';
            fullDesc.style.display = 'inline';
        }
    }
</script>
@endsection
