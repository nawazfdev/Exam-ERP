@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Exams List') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Exams.create') }}" class="btn btn-primary">{{ __('Create Exam') }}</a>
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
                            @if ($exams->count() > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('SR No.') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Group') }}</th>
                                            <th>{{ __('Duration') }}</th>
                                            <th>{{ __('Organization') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->title }}</td>
                                                <td>{{ $exam->group->name ?? __('N/A') }}</td>
                                                <td>{{ $exam->duration }} min</td>
                                                <td>
                                                    {{ $exam->organization->name ?? __('N/A') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('Exams.edit', $exam->id) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                                                    <form action="{{ route('Exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete this exam?') }}')">
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
                                    {{ $exams->links() }}
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    {{ __('No exams found.') }}
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
