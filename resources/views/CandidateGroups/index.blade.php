@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Candidate Groups') }}</h1>
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
                    <div class="alert alert-info">
                        Candidate Groups List
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div style="padding-right: 10px; padding-top: 10px; float:right;">
                                    <a href="{{ route('CandidateGroups.create') }}" class="btn btn-primary">
                                        {{ __('Create Candidate Group') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-20">
                            @if ($groups->count() > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:10%;">SR No.</th>
                                            <th style="width:30%;">Name</th>
                                            <th style="width:40%;">Description</th>
                                            <th style="width:20%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $key => $group)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $group->name }}</td>
                                                <td>{{ $group->description }}</td>
                                                <td>
                                                    <a href="{{ route('CandidateGroups.edit', $group->id) }}" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('CandidateGroups.destroy', $group->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure you want to delete this group?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $groups->links() }}
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    No candidate groups found.
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
