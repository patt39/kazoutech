@extends('inc.user._main')
<?php $item = htmlspecialchars(config('app.name'));?>
@section('title', 'Mettre à jour le mot de passe | '.$item)

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <div class="login-page">
        @include('inc.user.nav_auth')
        <section class="section section-shaped section-lg">
            <div class="shape shape-style-1 bg-gradient-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container pt-lg-md mt-6">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 mx-auto">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h4>{{ __('Récupération de mot de passe') }}</h4>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input id="email" type="email" placeholder="Entrez votre adresse mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">{{ __('Envoyer') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                @if (Route::has('login'))
                                    <a class="text-light" href="{{ route('login') }}">
                                        <small>{{ __('Connexion') }}</small>
                                    </a>
                                @endif
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('register') }}" class="text-light"><small>{{ __('Inscription') }}</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
