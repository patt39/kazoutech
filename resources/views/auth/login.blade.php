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
                                       <small>{{ __('Forgot Your Password?') }}</small>
                                   </a>
                               @endif
                           </div>
                           <div class="col-6 text-right">
                               <a href="{{ route('register') }}" class="text-light"><small>Create new account</small></a>
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
