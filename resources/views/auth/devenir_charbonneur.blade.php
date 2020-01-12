@extends('inc.user._main')
<?php $item = htmlspecialchars(config('app.name'));?>
@section('title', 'Enregistrez vous comme charbonneur  | '.$item)

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <div class="login-page">
        @include('inc.user.nav_auth')
        <div class="page-header kazouTech-page-header-mini header-filter">
            <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h3 class="display-3 text-white">Bienvenue chez KazouTech !</h3>
                        <h5 class="text-white">Développez votre activité de service à la personne, choisissez vos jobs et augmentez vos revenus.</h5>
                    </div>
                </div>
            </div>
        </div>

        <section class="kazouTech-register-upper mb-6">
            <div class="container kazouTech-register-container">
                <div class="row align-items-center">
                    <div class="col-md-5 mx-auto kazouTech-register-right-block">
                        <h1 class="display-3 mb-3">Devenez Charbonneur et améliorez votre quotidien</h1>
                        <div class="card card-blog card-background" data-animation="zooming">
                            <div class="full-background" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');"></div>
                            <a href="javascript:;">
                                <div class="card-body">
                                    <div class="content-bottom">
                                        <div class="row mb-4 kazouTech-content-bottom">
                                            <h5 class="card-title">
                                                <span class="kazouTech-register-icon"><i class="ni ni-bold-right"></i></span> Développez votre activité
                                            </h5>
                                            <h6 class="card-category text-white opacity-8">Proposez vos services et remportez des jobs</h6>
                                        </div>
                                        <div class="row kazouTech-content-bottom">
                                            <h5 class="card-title">
                                                <span class="kazouTech-register-icon"><i class="ni ni-bold-right"></i></span> Augmentez vos revenus
                                            </h5>
                                            <h6 class="card-category text-white opacity-8">Choisissez vos jobs et votre rémunération</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 mx-auto">
                        <div class="card card-contact card-raised">
                            <div class="card-body">
                                <h1 class="display-3">Inscription</h1>
                                <h5 class="desc">Donnez le sourire et gagnez de l’argent simplement</h5>
                                <div class="mt-4 mb-4 text-center social-container">
                                    <button type="button" class="btn btn-facebook btn-md">
                                        <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                                    </button>
                                    <button type="button" class="btn-instagram btn btn-md">
                                        <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
                                    </button>
                                    <button type="button" class="btn btn-twitter btn-md">
                                        <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                                    </button>
                                </div>
                                <div class="kazouTech-register-divider" data-label="Ou"></div>
                                <div id="app_kazoutech"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="text-center col-md-12 mt-5">
                        <h4 class="header-6">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></h4>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection

