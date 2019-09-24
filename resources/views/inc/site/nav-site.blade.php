<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="../index.html">
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
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Home</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Poster une demande</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="{{route('login')}}" class="btn btn-outline-info btn-icon">
                            <!--<span class="btn-inner--icon">
                              <i class="fa fa-cloud-download mr-2"></i>
                            </span>-->
                            <span class="nav-link-inner--text">Se connecter</span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="{{route('register')}}" class="btn btn-neutral btn-icon">
                            <!--<span class="btn-inner--icon">
                              <i class="fa fa-cloud-download mr-2"></i>
                            </span>-->
                            <span class="nav-link-inner--text">S'inscrire</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
