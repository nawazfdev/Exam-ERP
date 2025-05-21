@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Organizations List') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Organizations.create') }}" class="btn btn-primary">{{ __('Add New Organization') }}</a>
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
                        <div class="card-body">
                            @if ($organizations->count() > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('SR No.') }}</th>
                                            <th>{{ __('Organization Name') }}</th>
                                            <th>{{ __('Site Address') }}</th>
                                            <th>{{ __('Logo') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($organizations as $organization)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $organization->name }}</td>
                                                <td>{{ $organization->site_address ?? __('N/A') }}</td>
                                                <td>
                                                    @if($organization->logo)
                                                        <img src="{{ asset('storage/' . $organization->logo) }}" alt="{{ $organization->name }} Logo" width="50" height="50">
                                                    @else
                                                        <span>{{ __('No Logo') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge 
                                                        @if($organization->status == 'approved') badge-success 
                                                        @elseif($organization->status == 'pending') badge-warning 
                                                        @else badge-danger 
                                                        @endif">
                                                        {{ ucfirst($organization->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('Organizations.show', $organization->id) }}" class="btn btn-info btn-sm">{{ __('View') }}</a>
                                                    <a href="{{ route('Organizations.edit', $organization->id) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                                                    <form action="{{ route('Organizations.destroy', $organization->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete this organization?') }}')">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $organizations->links() }}
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    {{ __('No organizations found.') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
