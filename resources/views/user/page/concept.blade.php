@extends('inc.user._main')
@section('title', 'Home page')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @include('inc.user.nav_site')
    <div class="page-header  header-filter">
      <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/sections/photo-1.jpg');"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="display-2 text-white">Concept Kazoutech</h2>
          </div>
        </div>
        <div class="row">
          <div class="floating-box bg-default">
            <div class="box text-center">
              <div class="icon icon-shape bg-primary icon-xl rounded-circle text-white">
                <i class="ni ni-spaceship"></i>
              </div>
            </div>
            <blockquote class="blockquote text-center mt-4">
              <p class="title mb-0 text-white" stlyle="font-size: 60px">Bienvenue</p>
              <footer class="blockquote-footer text-white">Someone famous in
                <cite title="Source Title">Source Title</cite>
              </footer>
            </blockquote>
            <h2 class="lead text-white p-5"><em style="color: red">Kazoutech </em> est une plateforme de demande et de prestation de services en ligne.Principalement nous mettons en contact des particuliers et des technicien(ne) pour des services precis.Nous travaillons aussi avec des entreprises de dans le batiment et le genie civile.A noter que  sur notre plateforme, le prestataire a le status d'auto-entrepreneur et travail a sa guise.</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section features features-5">
        <div class="container">
          <div class="row">
            <div class="col-md-8 text-center mx-auto">
              <h3 class="display-3" style="font-weight: bold; color: red">Nos Valeurs</h3>
              <p class="lead">There’s nothing I wanted to do in life that I wasn’t able to get good at. I’m not really specifically talented at anything except for the ability to learn.</p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-lg-12 mt-md-5">
              <div class="row">
                <div class="col-md-6">
                  <div class="info">
                    <div class="pr-md-5">
                      <div class="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                        <i class="ni ni-atom"></i>
                      </div>
                      <h5 class="display-5">Awesome features</h5>
                      <p>The kit comes with three pre-built pages to help you get started faster.</p>
                      <ul class="list-unstyled">
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Beautiful elements</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Amazing page examples</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Super friendly support team</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info">
                    <div class="pr-md-5">
                      <div class="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                        <i class="ni ni-money-coins"></i>
                      </div>
                      <h5 class="display-5">Best prices</h5>
                      <p> If you're taught you can’t do anything, you won’t do anything. </p>
                      <ul class="list-unstyled">
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Beautiful elements</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Amazing page examples</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Super friendly support team</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="info">
                    <div class="pr-md-5">
                      <div class="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                        <i class="ni ni-support-16"></i>
                      </div>
                      <h5 class="display-5">Community support</h5>
                      <p>That’s the main thing people are always controlled by!</p>
                      <ul class="list-unstyled">
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Beautiful elements</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Amazing page examples</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Super friendly support team</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info">
                    <div class="pr-md-5">
                      <div class="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                        <i class="ni ni-laptop"></i>
                      </div>
                      <h5 class="display-5">Responsive componenets</h5>
                      <p>They're slowed down by their perception of themselves.</p>
                      <ul class="list-unstyled">
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Beautiful elements</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Amazing page examples</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div>
                              <div class="mr-3">
                                <i class="ni ni-check-bold"></i>
                              </div>
                            </div>
                            <div>
                              <p class="mb-0">Super friendly support team</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <section>
  <div class="section features-3 my-5" style="background-image: url('/assets/vendor_site/img/ill/bg_contactus3.svg')">
    <div class="project-2 my-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center my-5">
              <h3 class="display-3 text-white">Some of Our Awesome Products</h3>
              <p class="lead text-white">The time is now for it to be okay to be great. People in this world shun people for being great. </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="card card-project">
                <a href="javascript:;">
                  <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle mx-auto">
                    <i class="ni ni-favourite-28"></i>
                  </div>
                </a>
                <div class="card-body">
                  <h4 class="card-title mt-3">Slack bot</h4>
                  <p class="card-description">If everything I did failed - which it doesn't, it actually succeeds - just the fact that I'm willing to fail is an inspiration. People are so scared to lose that they don't even try.</p>
                  <div class="card-footer">
                    <button type="button" class="btn btn-link text-primary"><i class="ni ni-glasses-2"></i> Check more</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card card-project">
                <a href="javascript:;">
                  <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mx-auto">
                    <i class="ni ni-books"></i>
                  </div>
                </a>
                <div class="card-body">
                  <h4 class="card-title mt-3">Looking great</h4>
                  <p class="card-description">You have the opportunity to play this game of life you need to appreciate every moment. A lot of people don’t appreciate the moment until it’s motivating the doers.</p>
                  <div class="card-footer">
                    <button type="button" class="btn btn-link text-success"><i class="ni ni-key-25"></i> Find a opportunity</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card card-project">
                <a href="javascript:;">
                  <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle mx-auto">
                    <i class="ni ni-trophy"></i>
                  </div>
                </a>
                <div class="card-body">
                  <h4 class="card-title mt-3">Developer First</h4>
                  <p class="card-description">For standing out. But the time is now to be okay to be the greatest you. Would you believe in what you believe in, if you were the only one who believed it?</p>
                  <div class="card-footer">
                    <button type="button" class="btn btn-link text-warning"><i class="ni ni-notification-70"></i> Check more</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="card card-project">
                <a href="javascript:;">
                  <div class="icon icon-lg icon-shape icon-shape-secondary shadow rounded-circle mx-auto">
                    <i class="ni ni-favourite-28"></i>
                  </div>
                </a>
                <div class="card-body">
                  <h4 class="card-title mt-3">Prepare launch</h4>
                  <p class="card-description">Society has put up so many boundaries, so many limitations on what’s right and wrong that it’s almost impossible to get a pure thought out. It’s like a little kid, a little boy.</p>
                  <div class="card-footer">
                    <button type="button" class="btn btn-link text-secondary"><i class="ni ni-glasses-2"></i> Check out now</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card card-project">
                <a href="javascript:;">
                  <div class="icon icon-lg icon-shape icon-shape-danger shadow rounded-circle mx-auto">
                    <i class="ni ni-books"></i>
                  </div>
                </a>
                <div class="card-body">
                  <h4 class="card-title mt-3">Premium support</h4>
                  <p class="card-description">Pink is obviously a better color. Everyone’s born confident, and everything’s taken away from you matters is the people who are sparked by it follow their dreams, too.</p>
                  <div class="card-footer">
                    <button type="button" class="btn btn-link text-danger"><i class="ni ni-key-25"></i> Find a opportunity</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card card-project">
                <a href="javascript:;">
                  <div class="icon icon-lg icon-shape icon-shape-info shadow rounded-circle mx-auto">
                    <i class="ni ni-trophy"></i>
                  </div>
                </a>
                <div class="card-body">
                  <h4 class="card-title mt-3">Design tools</h4>
                  <p class="card-description">Constantly growing. We’re constantly making mistakes. We’re constantly trying to express ourselves and actualize our dreams the position that we want to be.</p>
                  <div class="card-footer">
                    <button type="button" class="btn btn-link text-info"><i class="ni ni-notification-70"></i> Check more</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <br /><br />
      <div class="subscribe-line">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto">
              <div class="text-center">
                <h2 class="title">Subscribe to our Newsletter</h2>
                <p class="description">
                  You'll be informed about updates, special offers and planned changes..
                </p>
              </div>
              <div class="card card-raised card-form-horizontal">
                <div class="card-body">
                  <form method="" action="">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input type="email" class="form-control" placeholder="Your Email...">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-primary">Subscribe</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @include('inc.user.footer_site')
@endsection

@section('script')

@endsection
