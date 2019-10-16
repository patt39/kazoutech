@extends('inc.site._main')
@section('title', '')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <main>
        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section section-lg section-shaped pb-250">
                <div class="shape shape-style-1 shape-default">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="container py-lg-md d-flex">
                    <div class="col px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="display-3  text-white">Kazoutech</h1>
                                <p class="lead  text-white">Particer a votre evollution a un changement.</p>
                                <div class="btn-wrapper">
                                    <a href="{{route('login')}}" class="btn btn-info btn-icon mb-3 mb-sm-0">
                                        <span class="btn-inner--icon">
                                            <i class="fa fa-sign-in"></i>
                                        </span>
                                        <span class="btn-inner--text">Se connecter</span>
                                    </a>
                                    <a href="{{route('register')}}" class="btn btn-white btn-icon mb-3 mb-sm-0">
                                        <span class="btn-inner--icon">
                                            <i class="ni ni-user-run"></i>
                                        </span>
                                        <span class="btn-inner--text">S'inscrire</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SVG separator -->
                <div class="separator separator-bottom separator-skew">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </section>
            <!-- 1st Hero Variation -->
        </div>
        <section class="section section-lg pt-lg-0 mt--200">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row row-grid">
                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                            <i class="ni ni-check-bold"></i>
                                        </div>
                                        <h6 class="text-primary text-uppercase">Download Argon</h6>
                                        <p class="description mt-3">Argon is a great free UI package based on Bootstrap 4 that includes the most important components and features.</p>
                                        <div>
                                            <span class="badge badge-pill badge-primary">design</span>
                                            <span class="badge badge-pill badge-primary">system</span>
                                            <span class="badge badge-pill badge-primary">creative</span>
                                        </div>
                                        <a href="#" class="btn btn-primary mt-4">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                            <i class="ni ni-istanbul"></i>
                                        </div>
                                        <h6 class="text-success text-uppercase">Build Something</h6>
                                        <p class="description mt-3">Argon is a great free UI package based on Bootstrap 4 that includes the most important components and features.</p>
                                        <div>
                                            <span class="badge badge-pill badge-success">business</span>
                                            <span class="badge badge-pill badge-success">vision</span>
                                            <span class="badge badge-pill badge-success">success</span>
                                        </div>
                                        <a href="#" class="btn btn-success mt-4">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                            <i class="ni ni-planet"></i>
                                        </div>
                                        <h6 class="text-warning text-uppercase">Prepare Launch</h6>
                                        <p class="description mt-3">Argon is a great free UI package based on Bootstrap 4 that includes the most important components and features.</p>
                                        <div>
                                            <span class="badge badge-pill badge-warning">marketing</span>
                                            <span class="badge badge-pill badge-warning">product</span>
                                            <span class="badge badge-pill badge-warning">launch</span>
                                        </div>
                                        <a href="#" class="btn btn-warning mt-4">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg">
            <div class="container">
                <div class="row justify-content-center text-center mb-lg">
                    <div class="col-lg-8 col-12">
                        <h6 class="display-4">Abonnez vous à notre newsletter pour etre notifié des derniers mise a jour!</h6>
                        <div class="row row-input">
                            <div  id="fooDiv" class="fooDiv col-sm-8 col-12">
                                <input type="text"  class="form-control" placeholder="Votre adresse e-mail"  name="foo" id="foo">
                            </div>
                            <div class="col-sm-8 col-12">
                                <input type="email" class="form-control" name="email" id="signupSrEmail" placeholder="Votre adresse e-mail" aria-label="Your email">
                            </div>
                            <div class="col-sm-4 col-12 pl-lg-0">
                                <button type="submit" class="btn btn-primary btn-block">S'abonner</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-lg">
                    <div class="col-lg-8">
                        <h2 class="display-3">The amazing Team</h2>
                        <p class="lead text-muted">According to the National Oceanic and Atmospheric Administration, Ted, Scambos, NSIDClead scentist, puts the potentially record maximum.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="px-4">
                            <img src="/assets/site/assets/img/theme/team-1-800x800.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;" alt="image">
                            <div class="pt-4 text-center">
                                <h5 class="title">
                                    <span class="d-block mb-1">Ryan Tompson</span>
                                    <small class="h6 text-muted">Web Developer</small>
                                </h5>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-warning btn-icon-only rounded-circle">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-icon-only rounded-circle">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-icon-only rounded-circle">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="px-4">
                            <img src="/assets/site/assets/img/theme/team-2-800x800.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;" alt="image">
                            <div class="pt-4 text-center">
                                <h5 class="title">
                                    <span class="d-block mb-1">Romina Hadid</span>
                                    <small class="h6 text-muted">Marketing Strategist</small>
                                </h5>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-icon-only rounded-circle">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-icon-only rounded-circle">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-icon-only rounded-circle">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="px-4">
                            <img alt="image" src="/assets/site/assets/img/theme/team-3-800x800.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                            <div class="pt-4 text-center">
                                <h5 class="title">
                                    <span class="d-block mb-1">Alexander Smith</span>
                                    <small class="h6 text-muted">UI/UX Designer</small>
                                </h5>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-info btn-icon-only rounded-circle">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-info btn-icon-only rounded-circle">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-info btn-icon-only rounded-circle">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="px-4">
                            <img alt="image" src="/assets/site/assets/img/theme/team-4-800x800.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                            <div class="pt-4 text-center">
                                <h5 class="title">
                                    <span class="d-block mb-1">John Doe</span>
                                    <small class="h6 text-muted">Founder and CEO</small>
                                </h5>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-success btn-icon-only rounded-circle">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-icon-only rounded-circle">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-icon-only rounded-circle">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg pt-0">
            <div class="container">
                <div class="card bg-gradient-warning shadow-lg border-0">
                    <div class="p-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="text-white">We made website building easier for you.</h3>
                                <p class="lead text-white mt-3">I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture.</p>
                            </div>
                            <div class="col-lg-3 ml-lg-auto">
                                <a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-lg btn-block btn-white">Download HTML</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg bg-gradient-default">
            <div class="container pt-lg pb-300">
                <div class="row text-center justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="display-3 text-white">Build something</h2>
                        <p class="lead text-white">According to the National Oceanic and Atmospheric Administration, Ted, Scambos, NSIDClead scentist, puts the potentially record low maximum sea ice extent tihs year down to low ice.</p>
                    </div>
                </div>
                <div class="row row-grid mt-5">
                    <div class="col-lg-4">
                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="ni ni-settings text-primary"></i>
                        </div>
                        <h5 class="text-white mt-3">Building tools</h5>
                        <p class="text-white mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="ni ni-ruler-pencil text-primary"></i>
                        </div>
                        <h5 class="text-white mt-3">Grow your market</h5>
                        <p class="text-white mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="ni ni-atom text-primary"></i>
                        </div>
                        <h5 class="text-white mt-3">Launch time</h5>
                        <p class="text-white mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
       <contact-us></contact-us>
        @guest
            <section class="section section-lg">
                <div class="container">
                    <div class="row row-grid justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2 class="display-3">Lancez-vous dès maintenant</h2>
                            <div class="btn-wrapper">
                                <a href="{{route('login')}}" class="btn btn-primary mb-3 mb-sm-0">S'incrire</a>
                                <a href="{{route('register')}}" class="btn btn-default">Se connecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            @if(Auth::user()->email_verified_at === null)
                <link-verify></link-verify>
            @endif
        @endguest
    </main>
@endsection

@section('script')

@endsection
