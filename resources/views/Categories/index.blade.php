@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Category List') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Categories.create') }}" class="btn btn-primary">{{ __('Create Category') }}</a>
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
                            <h3 class="card-title">List of Categories</h3>
                        </div>
                        <div class="card-body">
                            @if ($categories->count() > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $category)
                                            <tr>
                                                <!-- Displaying the index using $key -->
                                                <td>{{ $key + 1 }}</td>  <!-- Starts from 1, adjust if needed -->
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('Categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('Categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No categories found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
