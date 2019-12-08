
@extends('inc.site._main')
@section('title', 'Home page')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @include('inc.site.nav_site')
    <div class="contactus-3">
      <div class="page-header">
        <img class="bg-image" src="/assets/vendor_site/img/ill/bg_contactus3.svg" alt="">
      </div>
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-12 text-center mb-5">
            <h1 class="display-1">Frequently asked questions</h1>
            <h3 class="lead">We'd like to talk more about what you need</h3>
            <button class="btn btn-icon btn-primary mt-3" type="button">
              <span class="btn-inner--icon"><i class="ni ni-chat-round"></i></span>
              <span class="btn-inner--text">Chat with us</span>
            </button>
          </div>
        </div>
        <div class="cd-section" id="accordion">
    <!--     *********     ACCORDION 1      *********      -->
    <div class="accordion-1">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto">
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-primary text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      How do I order?
                      <i class="ni ni-bold-down float-right pt-1"></i>
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body opacity-8">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-primary text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      How can i make the payment?
                      <i class="ni ni-bold-down float-right pt-1"></i>
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body opacity-8">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-primary text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      How much time does it take to receive the order?
                      <i class="ni ni-bold-down float-right pt-1"></i>
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body opacity-8">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-primary text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour">
                      Can I resell the products?
                      <i class="ni ni-bold-down float-right pt-1"></i>
                    </button>
                  </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body opacity-8">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFifth">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-primary text-left" type="button" data-toggle="collapse" data-target="#collapseFifth" aria-controls="collapseFifth">
                      Where do I find the shipping details?
                      <i class="ni ni-bold-down float-right pt-1"></i>
                    </button>
                  </h5>
                </div>
                <div id="collapseFifth" class="collapse" aria-labelledby="headingFifth" data-parent="#accordionExample">
                  <div class="card-body opacity-8">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
     <div class="row">
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-square-pin"></i>
              </div>
              <h4 class="info-title">Address</h4>
              <p class="description px-0">12124 First Street, nr 54</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-email-83"></i>
              </div>
              <h4 class="info-title">Email</h4>
              <p class="description px-0">hello@email.com</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-mobile-button"></i>
              </div>
              <h4 class="info-title">Phone</h4>
              <p class="description px-0">+1(424) 535 3523</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-circle-08"></i>
              </div>
              <h4 class="info-title">Contact</h4>
              <p class="description px-0">Andrew Samian</p>
            </div>
          </div>
        </div>
      </div>
    </div>
        
    @include('inc.site.footer_site')
@endsection

@section('script')

@endsection
