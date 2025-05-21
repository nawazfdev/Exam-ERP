@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Blog Post List') }}</h1>
            </div>
            <div class="col-sm-6 text-right"> <!-- Add a 'text-right' class to align the button to the right -->
                <a href="{{ route('BlogPosts.create') }}" class="btn btn-primary">{{ __('Create Blog Category') }}</a>
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
                        <h3 class="card-title">List of Blog Post</h3>
                    </div>
                    <div class="card-body">
                        @if ($blogposts !== null && count($blogposts) > 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SNO#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th style="width:15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogposts as $key => $blogpost)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $blogpost->title }}</td>
                                            <td>
                                                @if ($blogpost->category)
                                                    {{ $blogpost->category->name }}
                                                @else
                                                    No Category
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Short Description (Initially Visible) -->
                                                <span class="short-desc-{{ $blogpost->id }}">
                                                    {!! Str::limit(strip_tags($blogpost->description), 300, '...') !!}
                                                    <a href="#" onclick="toggleDescription({{ $blogpost->id }})">Read More</a>
                                                </span>

                                                <!-- Full Description (Initially Hidden) -->
                                                <span class="full-desc-{{ $blogpost->id }}" style="display: none;">
                                                    {!! $blogpost->description !!}
                                                    <a href="#" onclick="toggleDescription({{ $blogpost->id }})">Read Less</a>
                                                </span>
                                            </td>
                                            
                                            <td>
                                                @if($blogpost->feature_image)
                                                    <img src="{{ asset('storage/' . $blogpost->feature_image) }}" alt="Post Image"
                                                        width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Add action buttons for editing and deleting blogcategories -->
                                                <a href="{{ route('BlogPosts.edit', $blogpost->slug) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('BlogPosts.destroy', $blogpost->id) }}" method="POST"
                                                    style="display: inline-block;">
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
                                {{ $blogposts->links() }}
                            </div>
                        @else
                            <p>No Blog Post found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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