<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="/">
                <img src="../assets/img/brand/white.png" alt="brand">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../index.html">
                                <img src="../assets/img/brand/blue.png" alt="brand">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                @guest
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{route('login')}}" class="btn btn-secondary btn-icon">
                                <span class="nav-link-inner--text">Connection</span>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item d-none d-lg-block ml-lg-4">
                                <a href="{{route('register')}}" class="btn btn-neutral btn-icon">
                                    <span class="nav-link-inner--text">Inscription</span>
                                </a>
                            </li>
                        @endif
                </ul>
                @else

                @can('dashboard')
                 @if(Auth::user()->my_status === 'active')
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="ni ni-bold-down d-lg-none"></i>
                            <span class="nav-link-inner--text">Dashboard</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="{{route('dashboard.index')}}" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="ni ni-align-center"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Dashboard</h6>
                                    </div>
                                </a>
                                <a href="{{route('users.index')}}" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-palette"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Dashboard users</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                 @endif
                @endcan
                @endguest
            </div>
        </div>
    </nav>
</header>
