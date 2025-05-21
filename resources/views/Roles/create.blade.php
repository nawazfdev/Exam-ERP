@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create New User Role') }}</h1>
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
                       <form action="{{ route('Roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" placeholder="{{ __('Name') }}" class="form-control" required>
                                </div>
                                <label>Permission</label>
                                <div class="form-check">
                                    <input type="checkbox" id="select-all-permissions" class="form-check-input">
                                    <label class="form-check-label" for="select-all-permissions">Select All</label>
                                </div>
                                
                                @foreach ($permissions->groupBy('group_name') as $groupName => $groupPermissions)
                                    <label>{{ $groupName }}</label>
                                
                                    @foreach ($groupPermissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" name="permission[]" class="form-check-input" value="{{ $permission->id }}">
                                            <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                @endforeach
                                
                            </div>
                            <div class="card-footer" style="background-color: white;">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
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