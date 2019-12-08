@extends('inc.user._main')
@section('title', 'Home page')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @include('inc.user.nav_site')
  <div class="wrapper">
    <div class="section-shaped">
      <div class="page-header page-header-small header-filter">
       <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');">
        </div>
        <div class="container">
          <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
              <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                <h1 class="text-white">Créez votre compt</h1>
                <p class="text-lead text-white">That’s the main thing people are controlled by! Thoughts - their perception of themselves!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
   <div class="main main-raised">
    <div class="bg-secondary bg-raised">
      <div class="container bg-white card">
        <div class="row">
          <div class="col-md-3">
            <div class="section">
              <!-- User Information -->
              <section class="text-center">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle img-raised">
                    <img src="/assets/vendor_site/img/placeholder.jpg" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                  <div>
                    <span class="btn btn-raised btn-round btn-primary btn-file btn-sm mx-auto mt-3">
                      <span class="fileinput-new">Add Photo</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="..."></span>
                    <br>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists btn-simple btn-sm" data-dismiss="fileinput"><i class="tim-icons icon-simple-remove"></i> Remove</a>
                  </div>
                </div>
                <h3 class="title mt-4">Charlie Bailey</h3>
              </section>
              <!-- User Information -->
              <!-- Profile Sidebar -->
              <section>
                <br>
                <ul class="nav flex-column" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                      <i class="tim-icons icon-single-02"></i>
                      Generale
                    </a>
                  </li>
                  <hr class="line-primary">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                      <i class="tim-icons icon-credit-card"></i>
                      Facturation
                    </a>
                  </li>
                  <hr class="line-primary">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                      <i class="tim-icons icon-lock-circle"></i>
                      Securité
                    </a>
                  </li>
                  <hr class="line-primary">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                      <i class="tim-icons icon-volume-98"></i>
                      Notifications
                    </a>
                  </li>
                </ul>
              </section>
              <!-- End Profile Sidebar -->
              <!-- Profile Completion -->
              <br><br><br>
              <div>
                <div class="progress-container progress-primary">
                  <span class="progress-badge">Profil Complet</span>
                  <div class="progress-wrapper">
                    <div class="progress-info">
                      <div class="progress-percentage">
                        <span class="text-primary">80%</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Profile Completion -->
            </div>
          </div>
          <div class="col-md-8 ml-auto">
            <div class="section">
              <div class="tab-content">
                <div class="tab-pane active" id="link1">
                  <div>
                    <header>
                      <h2 class="text-uppercase">Informations Generale</h2>
                    </header>
                    <hr class="line-primary"><br>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#firstName">Nom</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="firstName" name="firstName" class="form-control" type="text" value="Charlie" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#lastName">Prénom</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="lastName" name="lastName" class="form-control" type="text" value="Bailey" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Sex</label>
                      </div>
                      <div class="col-md-4 align-self-center">
                        <div class="form-group">
                          <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                            <option value="2">Male</option>
                            <option value="3">Feméle</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Date de naisançe</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="row">
                          <div class="col-md-4 align-self-center">
                            <div class="form-group">
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
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
                            <div class="form-group">
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
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
                          <div class="col-md-4">
                            <div class="form-group">
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
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
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#email">Email</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="email" name="email" class="form-control" type="email" value="charlie.bailey@example.com" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#confirmEmail">Confirmer votre Email</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="confirmEmail" name="confirmEmail" class="form-control" type="email" value="charlie.bailey@example.com" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#location">Ville</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <div class="form-group">
                          <input id="location" name="location" class="form-control" type="text" value="Sydney, A" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels" for="#phone">Numéro de télefone </label>
                      </div>
                      <div class="col-md-4 align-self-center">
                        <div class="form-group">
                          <input id="phone" name="phone" class="form-control" type="tel" value="+40 745 031 200" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Langue</label>
                      </div>
                      <div class="col-md-4 align-self-center">
                        <div class="form-group">
                          <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                            <option selected>Englais</option>
                            <option value="2">Français</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 align-self-center">
                        <label class="labels">Apptitudes</label>
                      </div>
                      <div class="col-md-9 align-self-center">
                        <input id="badges" type="text" value="VueJs,Angular,Laravel,React" placeholder="+ Add">
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Confirmer</button>
                        <button class="btn btn-outline-primary" type="reset">Annuler</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="link2">
                  <header>
                    <h2 class="text-uppercase">Method de facturation</h2>
                  </header>
                  <hr class="line-primary"><br>
                  <table class="table align-items-center">
                    <thead>
                      <tr>
                        <th scope="col">Type de carte</th>
                        <th scope="col">Numéro de la carte</th>
                        <th scope="col">Moyen de paiement</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">
                          <img alt="Image" src="../assets/img/visas.png" class="avatar">
                        </th>
                        <td>
                          <span class="d-block">•••• •••• •••• 8372</span>
                          <small class="text-muted">Exp: 06/22</small>
                        </td>
                        <td class="text-center">
                          <div class="custom-control custom-radio">
                            <input name="custom-radio-1" class="custom-control-input" id="Radios1" checked type="radio">
                            <label class="custom-control-label" for="Radios1"></label>
                          </div>
                        </td>
                        <td>
                          <button type="submit" class="btn btn-danger btn-sm btn-simple">
                            <i class="tim-icons icon-simple-remove"></i>
                            Remove card
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <img alt="Image" src="../assets/img/mastercard.png" class="avatar mastercard">
                        </th>
                        <td>
                          <span class="d-block">•••• •••• •••• 1225</span>
                          <small class="text-muted">Exp: 07/21</small>
                        </td>
                        <td class="text-center">
                          <div class="custom-control custom-radio">
                            <input name="custom-radio-1" class="custom-control-input" id="Radios2" type="radio">
                            <label class="custom-control-label" for="Radios2">
                            </label>
                          </div>
                        </td>
                        <td>
                          <button type="submit" class="btn btn-danger btn-sm btn-simple">
                            <i class="tim-icons icon-simple-remove"></i>
                            Remove card
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <button class="btn btn-primary btn-sm">
                    <i class="tim-icons icon-simple-add"></i>
                    Add card
                  </button>
                </div>
                <div class="tab-pane" id="link3">
                  <div class="g-pos-rel h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-30--md">
                    <header>
                      <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Security Questions</h2>
                    </header>
                    <hr class="line-primary">
                    <form>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Security Question</label>
                          <div class="form-group">
                            <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                              <option disabled selected>Your Question</option>
                              <option value="2">Question 1</option>
                              <option value="3">Question 2</option>
                              <option value="4">Question 3</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Your Answer</label>
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your answer">
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <header>
                        <h2 class="text-uppercase">Security Settings</h2>
                      </header>
                      <hr class="line-primary">
                      <div class="form-group d-flex align-items-center justify-content-between">
                        <span>Notify me via email when logging in</span>
                        <label class="custom-toggle">
                          <input type="checkbox">
                          <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON"></span>
                        </label>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between">
                        <span>Send SMS confirmation for all online payments</span>
                        <label class="custom-toggle">
                          <input type="checkbox" checked="">
                          <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON"></span>
                        </label>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between">
                        <span>Check which devices accessed your account</span>
                        <label class="custom-toggle">
                          <input type="checkbox">
                          <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON"></span>
                        </label>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between">
                        <span>Find My Device, make sure your device can be found if it gets lost</span>
                        <label class="custom-toggle">
                          <input type="checkbox" checked="">
                          <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON"></span>
                        </label>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between">
                        <span>Lock your device with a PIN, pattern, or password</span>
                        <label class="custom-toggle">
                          <input type="checkbox" checked="">
                          <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON"></span>
                        </label>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between">
                        <span>Manage what apps have access to app-usage data on your device</span>
                        <label class="custom-toggle">
                          <input type="checkbox">
                          <span class="custom-toggle-slider rounded-circle" data-label-off="OFF" data-label-on="ON"></span>
                        </label>
                      </div>
                      <div class="row mt-5 justify-content-end">
                        <div class="col-md-4 actions">
                          <button class="btn btn-outline-primary btn-sm" type="reset">Cancel</button>
                          <button class="btn btn-primary btn-sm" type="button">Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane" id="link4">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="alert alert-primary text-small" role="alert">
                          <i class="icon-shield"></i>
                          <span>
                            We will never distribute your email address to third parties. Read about email communication in our privacy policy.
                          </span>
                        </div>
                      </div>
                      <!--end of col-->
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-12">
                        <form>
                          <h5 class="mb-4">Notification Preferences</h5>
                          <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="notification1" type="checkbox" checked>
                            <label class="custom-control-label" for="notification1">
                              <span>Someone mentions me</span>
                            </label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="notification2" type="checkbox" checked>
                            <label class="custom-control-label" for="notification2">
                              <span>Someone follows me</span>
                            </label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="notification3" type="checkbox">
                            <label class="custom-control-label" for="notification3">
                              <span>Someone shares my activty</span>
                            </label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="notification4" type="checkbox">
                            <label class="custom-control-label" for="notification4">
                              <span>Someone messages me</span>
                            </label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="notification5" type="checkbox">
                            <label class="custom-control-label" for="notification5">
                              <span>Someone adds me to a project</span>
                            </label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="notification6" type="checkbox">
                            <label class="custom-control-label" for="notification6">
                              <span>Sales and promotions</span>
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary btn-sm mt-3 mb-5">Update preferences</button>
                        </form>
                      </div>
                      <!--end of col-->
                    </div>
                    <!--end of row-->
                    <hr>
                    <div class="row">
                      <div class="col-12">
                        <form>
                          <h5>Notification Frequency</h5>
                          <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-1" class="custom-control-input" id="freq1" type="radio">
                            <label class="custom-control-label" for="freq1">
                              <span>Daily</span>
                            </label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-1" class="custom-control-input" id="freq2" type="radio">
                            <label class="custom-control-label" for="freq2">
                              <span>Weekly</span>
                            </label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-1" class="custom-control-input" id="freq3" type="radio">
                            <label class="custom-control-label" for="freq3">
                              <span>Monthly</span>
                            </label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="custom-radio-1" class="custom-control-input" id="freq4" checked type="radio">
                            <label class="custom-control-label" for="freq4">
                              <span>Never</span>
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
                        </form>
                      </div>
                      <!--end of col-->
                    </div>
                    <!--end of row-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <div class="container-fluid">
        <!--     *********    SIMPLE SOCIAL LINE     *********      -->
        <div class="social-line social-line-blue text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <h4 class="title mb-4">Merçi pour votre soutien!</h4>
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
    @include('inc.user.footer_site')
@endsection

@section('script')

@endsection
