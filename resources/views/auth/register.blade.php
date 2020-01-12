@extends('inc.user._main')
@section('title', 'Register')

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
                        <h5 class="text-white">Suivez nous</h5>
                        <div class="mt-4 mb-4 text-center social-container">
                            <a href="#"  class="btn btn-facebook btn-md">
                                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                            </a>
                            <a href="#"  class="btn-instagram btn btn-md">
                                <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
                            </a>
                            <a href="#"  class="btn btn-twitter btn-md">
                                <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="app_kazoutech"></div>
    </div>
@endsection

@section('script')

@endsection

