@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Category') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Categories.index') }}" class="btn btn-primary">{{ __('Back to Categories') }}</a>
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
                        <form action="{{ route('Categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- This is used to specify that this is an update request -->
                            <div class="card-body">
                                <!-- Category Name Field -->
                                <label for="name">{{ __('Category Name') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Enter Category Name') }}" value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Category Status Field -->
                                <label for="status">{{ __('Category Status') }}</label>
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" class="btn btn-primary">{{ __('Update Category') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection
