@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Candidates List') }}</h1>
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
                        Candidates List
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div style="padding-right: 10px; padding-top: 10px; float:right;">
                                    <a href="{{ route('Candidates.create') }}" class="btn btn-primary">
                                        {{ __('Create Candidate') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-20">
                            @if ($candidates->count() > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">SNO#</th>
                                            <th style="width:15%;">Name</th>
                                            <th style="width:15%;">Email</th>
                                            <th style="width:10%;">Mobile</th>
                                            <th style="width:10%;">National ID</th>
                                            <th style="width:10%;">Status</th>
                                            <th style="width:15%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidates as $key => $candidate)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                                                <td>{{ $candidate->email }}</td>
                                                <td>{{ $candidate->mobile }}</td>
                                                <td>{{ $candidate->national_id }}</td>
                                                <td>
                                                    <span class="badge {{ $candidate->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ ucfirst($candidate->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('Candidates.edit', $candidate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('Candidates.destroy', $candidate->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure you want to delete this candidate?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $candidates->links() }}
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    No candidates found.
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $candidates->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
