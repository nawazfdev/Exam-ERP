@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Role') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Role') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="{{ route('Roles.update', $role->id) }}" method="POST">
                        @csrf
                                @method('PUT')
                                <div class="input-group mb-3">
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Name') }}" value="{{ old('name', $role->name) }}"  required>
                                    @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                {{-- <div class="input-group mb-3" style="display: block;">
                                    <label>Permission</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="select-all-permissions" class="form-check-input">
                                        <label class="form-check-label" for="select-all-permissions">Select All</label>
                                    </div>
                                
                                    @foreach ($role->permissions->groupBy('group_name') as $groupName => $groupPermissions)
                                    <label>{{ $groupName }}</label>
                                
                                        @foreach ($groupPermissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" name="permission[]" class="form-check-input" value="{{ $permission->id }}" 
                                                    @if ($role->hasPermissionTo($permission->name)) checked @endif>
                                                <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div> --}}
                                <div class="input-group mb-3" style="display: block;">
                                    <label>Permission</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="select-all-permissions" class="form-check-input">
                                        <label class="form-check-label" for="select-all-permissions">Select All</label>
                                    </div>
                                
                                    @foreach ($permissions->groupBy('group_name') as $groupName => $groupPermissions)
                                    <label>{{ $groupName }}</label>
                                    
                                    @foreach ($groupPermissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" name="permission[]" class="form-check-input" value="{{ $permission->id }}"
                                            @if ($role->hasPermissionTo($permission->name)) checked @endif>
                                        <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Update Role') }}</button>
                                </div>
                            </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        $(document).ready(function() {
    $('#select-all-permissions').change(function() {
        var isChecked = $(this).is(':checked');
        $('input[name="permission[]"]').prop('checked', isChecked);
    });
});
    </script>
@endsection
