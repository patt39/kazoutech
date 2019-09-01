@extends('inc.admin._main')
@section('title', '| Dashboard documentation')


@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @if(Auth::user()->my_status === 'active')
        <div class="content">
            <div class="container-fluid">
                <br>
                <!--
                <StatusAdmin/>
                -->
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 expo">
                                    <div class="card">
                                        <div class="card-header card-header-icon card-header-success" style="margin-top: -5px;">
                                            <div class="card-icon">
                                                <i class="material-icons">indeterminate_check_box</i>
                                            </div>
                                            <br>
                                            <h4 class="card-title" style="margin-top: 0px;"><b>Create</b> -
                                                <small class="category">New Documentation</small>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            {!! Form::open(array('route' => 'documentations.store','files'=> 'true','method'=>'POST')) !!}
                                                <div class="col-md-12">
                                                    <div class="card card-nav-tabs">
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating"></label>
                                                                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name document', 'required' => '']) !!}
                                                                                    @if ($errors->has('name'))
                                                                                        <span class="help-block">
                                                                                             <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8 ml-auto mr-auto">
                                                                                <div class="profile text-center">
                                                                                    <br>
                                                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                        <div class="fileinput-new thumbnail">
                                                                                            <img  src="https://www.kazoucoin.com/assets/img/photo.jpg" alt="...">
                                                                                        </div>
                                                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                        <div>
                                                                                              <span class="btn btn-raised btn-round btn-success btn-file">
                                                                                                 <span class="fileinput-new" style="cursor: pointer">
                                                                                                    <i class="material-icons">insert_photo</i>
                                                                                                             <b>Add Slide</b>
                                                                                                 </span>
                                                                                                  <span class="fileinput-exists" style="cursor: pointer">
                                                                                                     <i class="material-icons">photo_library</i>
                                                                                                          <b>Change</b>
                                                                                                  </span>
                                                                                                  {!! Form::file('name_doc', null, ['class' => 'form-control','id' =>'name_doc']) !!}
                                                                                              </span>
                                                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                                                                                <i class="material-icons">cancel</i>
                                                                                                <b>Remove</b>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- error -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="submit">
                                                    <div class="text-center">
                                                        <button id="button_hover"  type="submit" class="btn btn-success btn-raised btn-round">
                                                            <i class="material-icons">save_alt</i>
                                                            <b class="title_hover">Save</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="submit text-center">
          <error-404></error-404>
        </div>
    @endif
@endsection

@section('script')

@endsection