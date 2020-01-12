<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent headroom">
    <div class="container">
        <a class="navbar-brand mr-lg-5" href="/">
            <img src=".." alt="Kazoutech">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="../../../index.html">
                            <img src="../assets/img/brand/blue.png">
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
            <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                    <a href="/occupations/" class="nav-link"  role="button">
                        <i class="ni ni-app d-lg-none"></i>
                        <span class="nav-link-inner--text"><b>Demander un service</b></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/devenir_charbonneur/" class="nav-link"  role="button">
                        <i class="ni ni-app d-lg-none"></i>
                        <span class="nav-link-inner--text"><b>Dévenir charbonneur</b></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link" role="button">
                        <i class="ni ni-app d-lg-none"></i>
                        <span class="nav-link-inner--text"><b>Connexion</b></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">
                                       <span class="btn-inner--icon">
                                           <i class="ni ni-circle-08"></i>
                                       </span>
                        <span class="nav-link-inner--text pt-40 position-navbar">Inscription</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
