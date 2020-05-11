@extends('inc.admin._main')
@section('title', '- Admin Roles')
@section('sectionTitle', 'Roles')
@section('style')
@endsection

@section('content')
    <div class="main-panel">
        <top-nav></top-nav>
        <div class="content">

            <div class="container-fluid">

                <!-- le can('est la protection de la permission ') -->
            @can('edit-role')

                <!-- form init -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header card-header-icon card-header-success" style="margin-top: -5px;">
                                        <div class="card-icon">
                                            <i class="material-icons">indeterminate_check_box</i>
                                        </div>
                                        <br>
                                        <h4 class="card-title" style="margin-top: 0px;"><b>Update</b> -
                                            <small class="category">Update Role</small>
                                        </h4>
                                    </div>

                                    {!! Form::model($role, ['files'=> 'true','method' => 'PATCH','route' => ['roles.update', $role->id], 'id' => 'RegisterValidation']) !!}


                                    @include('admin.role.form')

                                    <br><br>
                                    <hr>
                                    <div class="submit">
                                        <div class="text-center">
                                            <a href="{{route('roles.index')}}" class="btn btn-info btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">undo</i>
                                    </span>
                                                <b>Back</b>
                                            </a>
                                            <button type="submit" class="btn btn-success btn-raised btn-round">
                                    <span class="btn-label">
                                        <i class="material-icons">save_alt</i>
                                    </span>
                                                <b>Update</b>
                                            </button>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                @endcan
            </div>
        <footer-admin></footer-admin>
    </div>
@endsection
@section('script')

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script>
@endsection
