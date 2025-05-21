@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Blog Category List') }}</h1>
                </div>
                <div class="col-sm-6 text-right"> <!-- Add a 'text-right' class to align the button to the right -->
                    <a href="{{ route('BlogCategories.create') }}" class="btn btn-primary">{{ __('Create Blog Category') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Blog Categories</h3>
                        </div>
                        <div class="card-body">
                        @if ($blogcategories !== null && count($blogcategories) > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SNO#</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogcategories as $key=>$category)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <!-- Add action buttons for editing and deleting blogcategories -->
                                                    <a href="{{ route('BlogCategories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('BlogCategories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                {{ $blogcategories->links() }}
                                </div>
                            @else
                                <p>No Blog categories found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
