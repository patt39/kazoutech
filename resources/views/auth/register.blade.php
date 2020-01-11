@extends('inc.user._main')
@section('title', 'Register')

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
                        <h1 class="display-3 mb-3">Devenez Jobeur et améliorez votre quotidien</h1>
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
                            <form role="form" id="contact-form" method="post">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group kazouTech-register-gender">
                                                <div class="custom-control custom-radio mb-3 col-md-4">
                                                    <input name="custom-radio-1" class="custom-control-input" id="homme" type="radio">
                                                    <label class="custom-control-label" for="homme">Je suis un Homme</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3 col-md-4">
                                                    <input name="custom-radio-1" class="custom-control-input" id="femme" checked="" type="radio">
                                                    <label class="custom-control-label" for="femme">Je suis une Femme</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nom et Prènom</label>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Votre Nom et Prènom ..." aria-label="Votre Nom et  Prènom ..." type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 pl-2">
                                            <div class="form-group">
                                                <label>Votre Pseudo</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Votre Pseudo ..." aria-label="Votre Pseudo ...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Jour de Naissance</label>
                                                    <div class="form-group">
                                                        <select class="form-control" data-trigger="" name="choices-single-default" id="choices-single-default">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                            <option selected="selected">11</option>
                                                            <option>12</option>
                                                            <option>13</option>
                                                            <option>14</option>
                                                            <option>15</option>
                                                            <option>16</option>
                                                            <option>17</option>
                                                            <option>18</option>
                                                            <option>19</option>
                                                            <option>20</option>
                                                            <option>21</option>
                                                            <option>22</option>
                                                            <option>23</option>
                                                            <option>24</option>
                                                            <option>25</option>
                                                            <option>26</option>
                                                            <option>27</option>
                                                            <option>28</option>
                                                            <option>29</option>
                                                            <option>30</option>
                                                            <option>31</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        <div class="col-md-4 align-self-center">
                                            <label>Mois de Naissance</label>
                                                    <div class="form-group">
                                                        <select class="form-control" data-trigger="" name="choices-single-default" id="choices-single-default">
                                                            <option>January</option>
                                                            <option>February</option>
                                                            <option>March</option>
                                                            <option selected="selected">April</option>
                                                            <option>May</option>
                                                            <option>June</option>
                                                            <option>July</option>
                                                            <option>August</option>
                                                            <option>September</option>
                                                            <option>October</option>
                                                            <option>November</option>
                                                            <option>December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        <div class="col-md-4">
                                            <label>Année de Naissance</label>
                                                    <div class="form-group">
                                                        <select class="form-control" data-trigger="" name="choices-single-default" id="choices-single-default">
                                                            <option>1986</option>
                                                            <option>1987</option>
                                                            <option>1988</option>
                                                            <option selected="selected">1989</option>
                                                            <option>1990</option>
                                                            <option>1991</option>
                                                            <option>1992</option>
                                                            <option>1993</option>
                                                            <option>1994</option>
                                                            <option>1995</option>
                                                            <option>1996</option>
                                                            <option>1997</option>
                                                            <option>1998</option>
                                                            <option>1999</option>
                                                            <option>2000</option>
                                                            <option>2001</option>
                                                            <option>2002</option>
                                                            <option>2003</option>
                                                            <option>2004</option>
                                                            <option>2005</option>
                                                            <option>2006</option>
                                                            <option>2007</option>
                                                            <option>2008</option>
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                            <option>2014</option>
                                                            <option>2015</option>
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                            <option>2019</option>
                                                        </select>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Votre Profession</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-settings"></i></span>
                                                    </div>
                                                    <select class="form-control" data-trigger="" name="choices-single-default" id="choices-single-default">
                                                        <option selected="">Select Profession</option>
                                                        <option value="CZ">Soudeur</option>
                                                        <option value="DK">Mecanicien</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Votre Ville</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                                                    </div>
                                                    <select class="form-control" data-trigger="" name="choices-single-default" id="choices-single-default">
                                                        <option selected="">Select country</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Addresse E-mail</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Votre E-mail ..." aria-label="Votre E-mail ...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Votre Numéro de Télephone</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Votre Numéro de Télephone ..." aria-label="Votre Numéro de Télephone ...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mot de Passe</label>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Votre Mot de Passe ..." aria-label="Votre Mot de Passe ..." type="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-2">
                                            <div class="form-group">
                                                <label>Confirmation Mot de Passe</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" placeholder="Confirmation Mot de Passe ..." aria-label="Confirmation Mot de Passe ...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox mt-2">
                                                <input class="custom-control-input" id="customCheck1" type="checkbox">
                                                <label class="custom-control-label" for="customCheck1">
                                                    <span>Je souhaite être informé des nouveautés, cadeaux et bons plans</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox mt-2">
                                                <input class="custom-control-input" id="customCheck2" type="checkbox">
                                                <label class="custom-control-label" for="customCheck2">
                                                    <span>Je souhaite recevoir les bons plans des partenaires</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kazouTech-register-submit mt-3 mb-3 text-center">
                                        <button type="submit" class="btn btn-primary">Je m'inscris</button>
                                    </div>
                                    <div class="row mt-4 mb-3">
                                        <div class="col-md-12">
                                            En vous inscrivant vous acceptez <a href="#">les conditions générales</a> et la <a href="#">politique de confidentialité</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

