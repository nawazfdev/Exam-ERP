@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Industries List') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Industries.create') }}" class="btn btn-primary">{{ __('Create Industry') }}</a>
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
                        <h3 class="card-title">List of Industries</h3>
                    </div>
                    <div class="card-body">
                        @if ($industries->count() > 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Feature Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($industries as $key => $Industry)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if($Industry->feature_image)
                                                    <img src="{{ asset('storage/' . $Industry->feature_image) }}" alt="Product Image"
                                                        width="100">

                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $Industry->title }}</td>
                                            <td>
                                                @if ($Industry->category)
                                                    {{$Industry->category->name }}
                                                @else
                                                    No Category
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Short Description (Initially Visible) -->
                                                <span class="short-desc-{{ $Industry->id }}">
                                                    {!! Str::limit(strip_tags($Industry->description), 300, '...') !!}
                                                    <a href="#" onclick="toggleDescription({{ $Industry->id }})">Read More</a>
                                                </span>

                                                <!-- Full Description (Initially Hidden) -->
                                                <span class="full-desc-{{ $Industry->id }}" style="display: none;">
                                                    {!! $Industry->description !!}
                                                    <a href="#" onclick="toggleDescription({{ $Industry->id }})">Read Less</a>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('Industries.edit', $Industry->slug) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <form action="{{ route('Industries.destroy', $Industry->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this Industry?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Industry found.</p>
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