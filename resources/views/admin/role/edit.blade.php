@extends('inc.admin._main')
@section('title', '- Admin Roles')
@section('sectionTitle', 'Roles')
@section('style')
@endsection

@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="main-panel" id="javascriptComponents">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"><b>@yield('sectionTitle')</b></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <div class="clock">
                            <ul>
                                <li id="Date"></li>
                            </ul>
                            <ul>
                                <li id="hours"></li>
                                <li id="point">:</li>
                                <li id="min"></li>
                                <li id="point">:</li>
                                <li id="sec"></li>
                            </ul>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard.index')}}" title="Dashboard">
                                    <i class="material-icons">dashboard</i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">email</i>
                                    <span class="notification">21</span>
                                    <p>
								<span class="d-lg-none d-md-block">Messages
									<b class="caret"></b>
								</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#pablo">Message Contact Us</a>
                                    <a class="dropdown-item" href="#pablo">Message Aide & Conatct</a>
                                    <a class="dropdown-item" href="#pablo">Message Work With Us</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="All Notifications">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p>
								<span class="d-lg-none d-md-block">Some Actions
									<b class="caret"></b>
								</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#pablo">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#pablo">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#pablo">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#pablo">Another Notification</a>
                                    <a class="dropdown-item" href="#pablo">Another One</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-with-icons" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="{{ route('admin.account')}}">
                                        <i class="material-icons">account_circle</i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="material-icons">settings_applications</i>
                                        Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" id="btnShowAlertUnlock" style="cursor:pointer;">
                                        <i class="material-icons" style="color:green;">settings_power</i>
                                        <b>Unlock</b>
                                    </a>
                                    <a class="dropdown-item" id="navLogout" style="cursor:pointer;">
                                        <i class="material-icons" style="color:red;">lock</i>
                                        <b>Logout</b>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <!-- le can('est la protection de la permission ') -->
        @can('edit-role')

        <!-- form init -->
        <div class="row">
            <div class="col-md-12 col-sm-6 ml-auto mr-auto">

                {!! Form::model($role, ['files'=> 'true','method' => 'PATCH','route' => ['roles.update', $role->id], 'id' => 'RegisterValidation']) !!}
                    <div class="card ">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">how_to_reg</i>
                            </div>
                            <h4 class="card-title">
                                <b>Update Role</b>
                            </h4>
                        </div>

                        @include('admin.role.form')

                        <br><br><hr>
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
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        @endcan
    </div>
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