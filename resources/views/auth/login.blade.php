@extends('inc.user._main')
<?php $item = htmlspecialchars(config('app.name'));?>
@section('title', 'Se connecter sur le site | '.$item)

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
                   <div class="col-lg-5">
                       <div class="card bg-secondary shadow border-0">
                           <div class="card-header bg-white pb-5">
                               <div class="text-muted text-center mb-3"><small>Se connecter avec</small></div>
                               <div class="btn-wrapper text-center">
                                   <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon">
                                          <img alt="image" src="/assets/site/assets/img/icons/common/github.svg">
                                        </span>
                                       <span class="btn-inner--text">Github</span>
                                   </a>
                                   <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon">
                                          <img alt="image" src="/assets/site/assets/img/icons/common/google.svg">
                                        </span>
                                       <span class="btn-inner--text">Google</span>
                                   </a>
                               </div>
                           </div>
                           <div id="app_kazoutech"></div>
                       </div>
                       <div class="row mt-3">
                           <div class="col-6">
                               @if (Route::has('password.request'))
                                   <a class="text-light" href="{{ route('password.request') }}">
                                       <small>{{ __('Mot de passe oublié?') }}</small>
                                   </a>
                               @endif
                           </div>
                           <div class="col-6 text-right">
                               <a href="{{ route('register') }}" class="text-light"><small>Inscription</small></a>
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
