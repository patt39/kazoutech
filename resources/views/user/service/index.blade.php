@extends('inc.site._main')
@section('title', 'Home page')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @include('inc.site.nav_site')
          <div class="page-header page-header-small header-filter">
            <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');"></div>
            <div class="container">
                <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2 class="display-2 text-white">Du service a la personne et du main à main entre particuliers</h2>
                </div>
                </div>
            </div>
            </div>
            <div class="section features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto text-center">
                            <h3 class="display-3">comment sa marche?</h3>
                            <p class="lead">Kazoutech vous offre l opportunité de travailler tout en restant auto-entreprenuer. Quesque vous attendez? devenez un des notre</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                    <i class="ni ni-settings-gear-65"></i>
                            </div>
                                <h6 class="info-title text-uppercase text-primary">Créer votre profile</h6>
                                <p class="description opacity-8">We get insulted by others, lose trust for those others. We get back stabbed by friends. It becomes harder for us to give others a hand.</p>
                                <a href="..." class="btn btn-primary" name="button">
                                    <span class="nav-link-inner--text pt-40">Inscription</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                    <i class="ni ni-atom"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-success">Devenez bosseur</h6>
                                <p class="description opacity-8">Don't get your heart broken by people we love, even that we give them all we have. Then we lose family over time. As we live, our hearts turn colder.</p>
                                <a href="..." class="btn btn-success" name="button">
                                    <span class="nav-link-inner--text pt-40">Inscription</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                    <i class="ni ni-world"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-warning">Faite vous de l'argent</h6>
                                <p class="description opacity-8">What else could rust the heart more over time? Blackgold. The time is now for it to be okay to be great. or being a bright color. For standing out.</p>
                                <a href="..." class="btn btn-warning" name="button">
                                    <span class="nav-link-inner--text pt-40">Inscription</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container text-center">
        <div class="row mb-5">
          <div class="col-md-8 mx-auto">
            <h3 class="display-3">Nos offres en quelque clicks choisissez votre categorie</h3>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-3">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/theme/josh-appel.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Menagerie</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/theme/john-hoang.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Démenagement</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/theme/kit-suman.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Location multiple</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-3">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/theme/josh-appel.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title">Maçonnerie</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/theme/john-hoang.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Menuiserie</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/theme/kit-suman.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Soudure</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/damian.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">meccanique</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/chrisa.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Charpenterie</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card card-blog card-background" data-animation="zooming">
              <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/odin.jpg"></div>
              <a href="javascript:;">
                <div class="card-body">
                  <div class="content-bottom">
                    <h5 class="card-title text-uppercase">Electricité</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    <br /><br />
    <div class="social-line social-line-blue text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <h4 class="title mb-4">Thank you for your support!</h4>
              </div>
              <a href="javascript:;" class="btn btn-twitter btn-round">
                <i class="fab fa-twitter"></i> Twitter · 2.5k
              </a>
              <a href="javascript:;" class="btn btn-facebook btn-round">
                <i class="fab fa-facebook-square"></i> Facebook · 3.2k
              </a>
              <a href="javascript:;" class="btn btn-tumblr btn-round">
                <i class="fab fa-tumblr"></i> Tumblr · 1.2k
              </a>
              <a href="javascript:;" class="btn btn-dribbble btn-round">
                <i class="fab fa-dribbble"></i> Dribbble · 1.8k
              </a>
            </div>
          </div>
        </div>
        <!--     *********   SIMPLE SOCIAL LINE     *********      -->
        <br><br>
        <!--     *********    SIMPLE SOCIAL LINE     *********      -->
        <div class="social-line social-line-big-icons">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 mb-md-4 mb-lg-0">
                <a href="javascript:;" class="btn btn-gradient-twitter btn-footer">
                  <i class="fab fa-twitter"></i>
                  <p class="title">twitter</p>
                  <p class="subtitle">@creativetim</p>
                </a>
              </div>
              <div class="col-lg-3 col-md-6 mb-md-4 mb-lg-0">
                <a href="javascript:;" class="btn btn-gradient-facebook btn-footer">
                  <i class="fab fa-facebook-square"></i>
                  <p class="title">facebook</p>
                  <p class="subtitle">@creativetim</p>
                </a>
              </div>
              <div class="col-lg-3 col-md-6">
                <a href="javascript:;" class="btn btn-gradient-slack btn-footer">
                  <i class="fab fa-slack"></i>
                  <p class="title">slack</p>
                  <p class="subtitle">@creativetim</p>
                </a>
              </div>
              <div class="col-lg-3 col-md-6">
                <a href="javascript:;" class="btn btn-gradient-instagram btn-footer">
                  <i class="fab fa-instagram"></i>
                  <p class="title">instagram</p>
                  <p class="subtitle">@creativetim</p>
                </a>
              </div>
            </div>
          </div>
        </div>
      <div class="subscribe-line subscribe-line-white">
          <div class="container">
            <div class="row">
              <div class="col-lg-5 mr-auto">
                <h4 class="title">Restez a l'affue chaque semaine!</h4>
                <p class="description">
                  Rejoigniez notre newsletter et ayez de nos nouvelle chaque semaine n ayez craint nous detestons aussi les spam
                </p>
              </div>
              <div class="col-lg-6 d-flex justify-content-center flex-column ml-auto">
                <form method="" action="">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input class="form-control" placeholder="votre Email..." type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-success btn-block">souscrivez</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('inc.site.footer_site')
  </div>
@endsection

@section('script')

@endsection
