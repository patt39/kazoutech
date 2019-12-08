@extends('inc.site._main')
@section('title', 'Home page')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @include('inc.site.nav_site')
    <div class="page-header page-header-small header-filter skew-header">
        <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/georgie.jpg')"></div>
          <div class="container pt-300">
            <div class="row">
            <div class="col-lg-10 mx-auto text-center">
            <h2 class="display-2 text-white">A propos de nous...</h2>
          </div>
            </div>
         </div>
      </div>
    </div>
    <div class="section features-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-4 mr-auto text-left mt-4">
              <div class="card bg-default shadow border-0">
                <img src="/assets/vendor_site/img/theme/img-1-1200x1000.jpg" class="card-img-top">
                <blockquote class="card-blockquote">
                  <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                    <polygon points="0,52 583,95 0,95" class="fill-default"></polygon>
                    <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default"></polygon>
                  </svg>
                  <h4 class="display-4 text-white">Design System</h4>
                  <p class="lead text-italic text-white">That’s my skill. I’m not really specifically talented at anything except for the ability to learn. </p>
                </blockquote>
              </div>
            </div>
            <div class="col-lg-7 p-sm-0">
              <div class="row">
                <div class="col-md-6">
                  <div class="info info-hover-warning">
                    <div class="icon icon-shape bg-warning shadow rounded-circle text-primary">
                      <i class="ni ni-satisfied text-white"></i>
                    </div>
                    <h5 class="info-title">Best Quality</h5>
                    <p class="description opacity-8">It becomes harder for us to give others a hand. We get our heart broken by people we love.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info info-hover-info">
                    <div class="icon icon-shape bg-info shadow rounded-circle text-primary">
                      <i class="ni ni-palette text-white"></i>
                    </div>
                    <h5 class="info-title">Awesome Design</h5>
                    <p class="description opacity-8">As we live, our hearts turn colder. Cause pain is what we go through as we become older.</p>
                  </div>
                </div>
              </div>
              <div class="row mt-lg-4">
                <div class="col-md-6">
                  <div class="info info-hover-danger">
                    <div class="icon icon-shape bg-danger shadow rounded-circle text-primary">
                      <i class="ni ni-user-run text-white"></i>
                    </div>
                    <h5 class="info-title">Fast Development</h5>
                    <p class="description opacity-8">We’re not always in the position that we want to be at. We’re constantly growing.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info info-hover-success">
                    <div class="icon icon-shape bg-success shadow rounded-circle text-primary">
                      <i class="ni ni-glasses-2 text-white"></i>
                    </div>
                    <h5 class="info-title">Super Fresh</h5>
                    <p class="description opacity-8">When we lose family over time. What else could rust the heart more over time? Blackgold.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <section class="blogs-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h3 class="display-3 mb-5">Notre Derniér Blogpost</h3>
            <div class="card card-blog card-background card-grande" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/unsplashs.jpg')"></div>
              <a href="javascript:;">
                <div class="card-body mb-4">
                  <h2 class="card-title">Miami Vice</h2>
                  <p class="card-description text-white">The simplest visual description uses ordinary words to convey what the writer sees. First he or she must look at the subject – slowly, carefully, and repeatedly, if possible – to identify the parts that make the whole</p>
                  <div class="author">
                    <img src="/assets/vendor_site/img/faces/team-4.jpg" alt="..." class="avatar">
                    <span class="text-white">by Johanna Zmud</span>
                  </div>
                  <br>
                  <a class="btn btn-primary" href="javascript:;">
                    Read more...
                  </a>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="team-1">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h3 class="display-3">Notre super Equipe</h3>
            <p class="lead">En quelque mots les artisans derriere cette ingenieuse immagination se presente. Nhesitez pas de nous contacter pour mieux nous conaitre nous somme toujours a votre disposition </p>
          </div>
        </div>
        <div class="row">
          <div id="carouselExampleControls" class="carousel slide carousel-team">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="container">
                  <div class="row">
                    <div class="col-md-5 p-5">
                      <div class="p-4">
                        <img class="rounded shadow transform-perspective-left" src="/assets/vendor_site/img/theme/kareya-saleh.jpg" alt="First slide">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="wrapper p-md-0">
                        <h3 class="card-title display-3">Boclair Temgoua</h3>
                        <div class="lead">
                          Artist is a term applied to a person who engages in an activity deemed to be an art. An artist also may be defined unofficially as "a person should is one who expresses him- or herself through a medium". He is should a descriptive term applied to a person who engages in an activity deemed to be an art.
                        </div>
                        <ul class="list-unstyled mb-0">
                          <li class="py-1">
                            <div class="d-flex align-items-center">
                              <div>
                                <div class="badge badge-circle badge-info mr-3">
                                  <i class="ni ni-atom"></i>
                                </div>
                              </div>
                              <div>
                                <p class="mb-1">Entrepreneur</p>
                              </div>
                            </div>
                          </li>
                          <li class="py-1">
                            <div class="d-flex align-items-center">
                              <div>
                                <div class="badge badge-circle badge-success mr-3">
                                  <i class="ni ni-user-run"></i>
                                </div>
                              </div>
                              <div>
                                <p class="mb-1">Urban exploration</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <div class="footer text-left">
                          <a href="javascript:;" class="btn btn-twitter btn-sm rounded-circle"><i class="fab fa-twitter"></i></a>
                          <a href="javascript:;" class="btn btn-facebook btn-sm rounded-circle"><i class="fab fa-facebook-square"></i></a>
                          <a href="javascript:;" class="btn btn-dribbble btn-sm rounded-circle"><i class="fab fa-dribbble"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="row">
                    <div class="col-md-5 p-5">
                      <div class="p-4">
                        <img class="rounded shadow transform-perspective-left" src="/assets/vendor_site/img/theme/lucy.jpg" alt="First slide">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="wrapper p-md-0">
                        <h1 class="card-title">Patrick Noubissi</h1>
                        <div class="lead">
                          Artist is a term applied to a person who engages in an activity deemed to be an art. An artist also may be defined unofficially as "a person should is one who expresses him- or herself through a medium". He is should a descriptive term applied to a person who engages in an activity deemed to be an art."
                        </div>
                        <ul class="list-unstyled mb-0">
                          <li class="py-1">
                            <div class="d-flex align-items-center">
                              <div>
                                <div class="badge badge-circle badge-info mr-3">
                                  <i class="ni ni-atom"></i>
                                </div>
                              </div>
                              <div>
                                <p class="mb-1">Dedicated entrepreneur</p>
                              </div>
                            </div>
                          </li>
                          <li class="py-1">
                            <div class="d-flex align-items-center">
                              <div>
                                <div class="badge badge-circle badge-success mr-3">
                                  <i class="ni ni-user-run"></i>
                                </div>
                              </div>
                              <div>
                                <p class="mb-1">Urban exploration</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <div class="footer text-left">
                          <a href="javascript:;" class="btn btn-twitter btn-sm rounded-circle"><i class="fab fa-twitter"></i></a>
                          <a href="javascript:;" class="btn btn-facebook btn-sm rounded-circle"><i class="fab fa-facebook-square"></i></a>
                          <a href="javascript:;" class="btn btn-dribbble btn-sm rounded-circle"><i class="fab fa-dribbble"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="row">
                    <div class="col-md-5 p-5">
                      <div class="p-4">
                        <img class="rounded shadow transform-perspective-left" src="/assets/vendor_site/img/theme/willy-dade.jpg" alt="First slide">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="wrapper p-md-0">
                        <h1 class="card-title">Randrin Nzeukang</h1>
                        <div class="lead">
                          Artist is a term applied to a person who engages in an activity deemed to be an art. An artist also may be defined unofficially as "a person should is one who expresses him- or herself through a medium". He is should a descriptive term applied to a person who engages in an activity deemed to be an art."
                        </div>
                        <ul class="list-unstyled mb-0">
                          <li class="py-1">
                            <div class="d-flex align-items-center">
                              <div>
                                <div class="badge badge-circle badge-info mr-3">
                                  <i class="ni ni-atom"></i>
                                </div>
                              </div>
                              <div>
                                <p class="mb-1">Dedicated entrepreneur</p>
                              </div>
                            </div>
                          </li>
                          <li class="py-1">
                            <div class="d-flex align-items-center">
                              <div>
                                <div class="badge badge-circle badge-success mr-3">
                                  <i class="ni ni-user-run"></i>
                                </div>
                              </div>
                              <div>
                                <p class="mb-1">Urban exploration</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <div class="footer text-left">
                          <a href="javascript:;" class="btn btn-twitter btn-sm rounded-circle"><i class="fab fa-twitter"></i></a>
                          <a href="javascript:;" class="btn btn-facebook btn-sm rounded-circle"><i class="fab fa-facebook-square"></i></a>
                          <a href="javascript:;" class="btn btn-dribbble btn-sm rounded-circle"><i class="fab fa-dribbble"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <i class="ni ni-bold-left"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <i class="ni ni-bold-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center text-left">
                  <div class="col-lg-5 col-12">
                       <h1 class="display-3">Contactez nous,<span class="text-primary"> Develop Anything.</span></h1>
                        <p class="lead pb-4">Restez toujour informer en vous connectant a notre newsletter.</p>
                         <div class="row row-input">
                        <div class="col-sm-8 col-12">
                                <input type="email" class="form-control" name="email" id="signupSrEmail" placeholder="Your email" aria-label="Your email">
                            </div>
                            <div class="col-sm-4 col-12 pl-lg-0">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                            </div>
                       </div>
                        <div class="col-lg-7 col-12 pl-0">
                            <img class="ml-lg-5" src="/assets/vendor_site/img/ill/bg6-2.svg" width="100%">
                        </div>
                        </div>
                    </div>
               </div>
    @include('inc.site.footer_site')
@endsection

@section('script')

@endsection
