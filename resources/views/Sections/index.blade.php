@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Sections List') }}</h1>
                </div>
                <div class="col-sm-6 text-right"> <!-- Add a 'text-right' class to align the button to the right -->
                    <a href="{{ route('Sections.create') }}" class="btn btn-primary">{{ __('Create Sections') }}</a>
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
                            <h3 class="card-title">List of Sections</h3>
                        </div>
                        <div class="card-body">
                        @if ($sections !== null && count($sections) > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SNO#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sections as $key=>$section)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $section->name }}</td>
                                                <td>{{ $section->description }}</td>
                                                <td>
                                                    <!-- Add action buttons for editing and deleting blogcategories -->
                                                    <a href="{{ route('Sections.edit', $section->id) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('Sections.destroy', $section->id) }}" method="POST" style="display: inline-block;">
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
                                {{ $sections->links() }}
                                </div>
                            @else
                                <p>No Section found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
