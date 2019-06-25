@extends('inc.admin._main')
@section('title', '- Admin Roles')
@section('sectionTitle', 'Roles')

@section('style')

@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">

            <br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">how_to_reg</i>
                            </div>
                            <p class="card-category"><b>All Roles</b>
                            <h3 class="card-title" style="color:red;"><b>{{ $roles->count() }}</b></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">how_to_reg</i><b>All Roles</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('all-role')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">
                                    <b>Datatables Administrators Roles</b>
                                </h4>
                                <p class="card-title">
                                    Administrators roles
                                </p>
                            </div>
                            <br>
                            <div class="card-body">
                                <div class="toolbar">
                                    @can('create-role')
                                        <div class="submit text-center">
                                            <a href="{{route('roles.create')}}"
                                               class="btn btn-warning btn-raised btn-round">
                                                <i class="material-icons">person_add</i>
                                                <b>New Role</b>
                                            </a>
                                        </div>
                                @endcan
                                <!-- Here you can write extra buttons/actions for the toolbar  -->
                                </div>
                                <br>
                                @can('delete-multiple-role')
                                    <div class="submit text-left">
                                        <button class="btn btn-danger btn-raised btn-round delete-all "
                                                data-url="">
                                            <i class="material-icons">delete_forever</i>
                                            <b>Delete select</b>
                                        </button>
                                    </div>
                                @endcan
                                <br>
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                           cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            @can('delete-multiple-role')
                                                <th></th>
                                            @endcan
                                            <th><b>Name</b></th>
                                            <th><b>Permission</b></th>
                                            <th class="disabled-sorting text-right"><b>Actions</b></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            @can('delete-multiple-role')
                                                <th></th>
                                            @endcan
                                            <th><b>Name</b></th>
                                            <th><b>Permission</b></th>
                                            <th class="text-right"><b>Actions</b></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @if(count($roles) > 0)
                                            @foreach($roles as $lk)
                                                <tr id="tr_{{$lk->id}}">
                                                    @can('delete-multiple-role')
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input checkbox"
                                                                           type="checkbox" data-id="{{$lk->id}}">
                                                                    <span class="form-check-sign">
														<span class="check"></span>
													</span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    @endcan
                                                    <td>{{ $lk->name}}</td>
                                                    <td>
                                                        @foreach ($lk->permissions()->pluck('name') as $permission)
                                                            <span class="badge badge-success  badge-pill">{{ $permission }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        @can('edit-role')
                                                            <a href="{{ route('roles.edit',$lk->id) }}"
                                                               class="btn btn-link  btn-success btn-round btn-just-icon "><i
                                                                        class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('delete-role')
                                                            <button type="button"
                                                                    class="btn btn-link btn-danger btn-round btn-just-icon "
                                                                    data-toggle="modal" data-target="#delete"
                                                                    data-catid="{{ $lk->id }}">
                                                                <i class="material-icons">delete_forever</i>
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else

                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end content-->
                        </div>
                        <!--  end card  -->
                    </div>
                    <!-- end col-md-12 -->
                </div>
            @else
                <div class="submit text-center">
                    @include('inc.admin.components.alert_permission')
                </div>
        @endcan
        <!-- end row -->
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel"><b>Delete Confirmation Role</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('roles.destroy','name') }}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        Are you sure you want to delete this Role?
                        <input type="hidden" name="role_id" id="cat_id" value=" ">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>No, Cancel</b></button>
                        <button type="submit" class="btn btn-danger"><b>Yes, Delete</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        $('#delete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var cat_id = button.data('catid')
            var modal = $(this)

            modal.find('.modal-body #cat_id').val(cat_id);

        })
        $('#delete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var cat_id = button.data('catid')
            var modal = $(this)
            modal.find('.modal-body #cat_id').val(cat_id);
        })
    </script>
@endsection