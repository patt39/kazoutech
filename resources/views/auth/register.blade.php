@extends('inc.user._main')
@section('title', 'Register')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <div class="login-page">
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
                            <a href="/technician_become/" class="nav-link"  role="button">
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
        <div class="page-header page-header-mini header-filter">
            <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h3 class="display-2 text-white">Bienvenue chez KazouTech !</h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="upper mt-6 mb-6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="card card-blog card-background" data-animation="zooming">
                            <div class="full-background" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');"></div>
                            <a href="javascript:;">
                                <div class="card-body">
                                    <div class="content-bottom">
                                        <h5 class="card-title">J'ai besoin d'un service</h5>
                                        <h6 class="card-category text-white opacity-8">Trouvez le prestataire idéal pour vos services du quotidien</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <h2 class="display-2">Ou</h2>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-blog card-background" data-animation="zooming">
                            <div class="full-background" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');"></div>
                            <a href="javascript:;">
                                <div class="card-body">
                                    <div class="content-bottom">
                                        <h5 class="card-title">Devenir Jobbeur</h5>
                                        <h6 class="card-category text-white opacity-8">Augmentez vos revenus en rendant service près de chez vous</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="mr-auto ml-auto mt-5 mb-5">
                        <h4 class="header-6">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></h4>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection

