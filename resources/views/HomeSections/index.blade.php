@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Home Sections List') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('HomeSections.create') }}" class="btn btn-primary">{{ __('Create Home Section') }}</a>
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
                        <h3 class="card-title">List of Home Sections</h3>
                    </div>
                    <div class="card-body">
                        @if ($homesections->count() > 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($homesections as $key => $homesection)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $homesection->title }}</td>
                                            <td>{{ $homesection->type }}</td>
                                            <td>
                                                <!-- Short Description (Initially Visible) -->
                                                <span class="short-desc-{{ $homesection->id }}">
                                                    {!! Str::limit(strip_tags($homesection->description), 300, '...') !!}
                                                    <a href="#" onclick="toggleDescription({{ $homesection->id }})">Read More</a>
                                                </span>

                                                <!-- Full Description (Initially Hidden) -->
                                                <span class="full-desc-{{ $homesection->id }}" style="display: none;">
                                                    {!! $homesection->description !!}
                                                    <a href="#" onclick="toggleDescription({{ $homesection->id }})">Read Less</a>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('HomeSections.edit', $homesection->id) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <form action="{{ route('HomeSections.destroy', $homesection->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this Section?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Home Section found.</p>
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