@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages List') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Pages.create') }}" class="btn btn-primary">{{ __('Create New Page') }}</a>
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
                            <h3 class="card-title">List of Pages</h3>
                        </div>
                        <div class="card-body">
                            @if ($pages->count() > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Feature Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $key => $page)
                                            <tr>
                                                <!-- Displaying the index using $key -->
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $page->title }}</td>
                                                <td>{{ $page->slug }}</td>
                                                <td>
                                                @if($page->feature_image)
                                                    <img src="{{ asset('storage/' . $page->feature_image) }}" alt="Page Image"
                                                        width="100">

                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('Pages.edit', $page->id) }}" class="btn btn-primary">Edit</a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('Pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No pages found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
