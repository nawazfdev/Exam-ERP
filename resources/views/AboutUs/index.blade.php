@extends('layouts.app')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('About Us') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('AboutUs.create') }}" class="btn btn-primary">{{ __('Add New') }}</a>
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
                    <div class="card-header">
                        <h3 class="card-title">{{ __('About Us List') }}</h3>
                    </div>
                    <div class="card-body">
                        @if ($aboutUs->count() > 0)  <!-- Check if records exist -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Items</th> <!-- Added column for items -->
                                        <th style="width:15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutUs as $index => $about)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($about->feature_image)
                                                    <img src="{{ asset('storage/' . $about->feature_image) }}" alt="Post Image"
                                                        width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $about->title }}</td>
                                            <td>{{ strip_tags($about->description)}}</td>
                                            <td>
                                                @if($about->items->count() > 0)
                                                    <ul>
                                                        @foreach($about->items as $item)
                                                            <li>{{ $item->heading }}: {{ Str::limit(strip_tags($item->content), 50) }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p>No items available</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('AboutUs.edit', $about->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('AboutUs.destroy', $about->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this?');">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $aboutUs->links() }}  <!-- Laravel pagination links -->
                            </div>
                        @else
                            <p class="text-center text-muted">No records found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
