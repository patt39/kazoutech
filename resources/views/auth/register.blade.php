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
                            <a href="/devenir_charbonneur/">
                                <div class="card-body">
                                    <div class="content-bottom">
                                        <h5 class="card-title">Devenir Charbonneur</h5>
                                        <h6 class="card-category text-white opacity-8">Augmentez vos revenus en rendant service près de chez vous</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="mr-auto ml-auto mt-5 mb-5">
                        <h4 class="header-6">Vous avez déjà un compte ? <a href="https://www.kazoutech.com/login">Connectez-vous</a></h4>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection

