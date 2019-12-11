<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent headroom">
    <div class="container">
        <router-link :to="{ name: 'index.site' }" class="navbar-brand mr-lg-5">
            <img src="/assets/vendor_site/img/brand/white.png">
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="/">
                            <img src="/assets/img/vendor_site/brand/blue.png">
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
                @can('dashboard')
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link" role="button">
                        <i class="ni ni-app d-lg-none"></i>
                        <span class="nav-link-inner--text"><b>Dashboard</b></span>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <router-link :to="{ name: 'occupations.site' }"  class="nav-link"  role="button">
                        <i class="ni ni-app d-lg-none"></i>
                        <span class="nav-link-inner--text"><b>Demander un service</b></span>
                    </router-link>
                </li>
                <li class="nav-item">
                <router-link :to="{ name: 'technician_become' }"  class="nav-link"  role="button">
                        <i class="ni ni-app d-lg-none"></i>
                        <span class="nav-link-inner--text"><b>Dévenir un bosseur</b></span>
                </router-link>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link" role="button">
                            <i class="ni ni-app d-lg-none"></i>
                            <span class="nav-link-inner--text"><b>Connexion</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="btn btn-primary" role="button">
                            <span class="nav-link-inner--text pt-40">Inscription</span>
                        </a>
                    </li>
                @else
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                            @if(Auth::user()->avatar)
                                <img src="{{ url(Auth::user()->avatar)  }}" alt="Circle Image"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"> {{ Auth::user()->username }}
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <router-link class="dropdown-item" :to="{ path: `/dashboard` }" >
                                <i class="ni ni-lock-circle-open text-muted"></i>
                                  <b> {{ __('Account Settings') }}</b>
                            </router-link>
                            <router-link class="dropdown-item"  :to="{ path: `/profile/edit` }">
                                <i class="ni ni-tv-2 text-danger"></i>
                                <b> {{ __('Paramètres') }}</b>
                            </router-link>
                            <a class="dropdown-item" href="../examples/register-page.html">
                                <i class="ni ni-air-baloon text-pink"></i>
                                Register Page
                            </a>
                            <a class="dropdown-item" href="../examples/reset-page.html">
                                <i class="ni ni-atom text-info"></i>
                                Reset Page
                            </a>
                            <a class="dropdown-item" href="../examples/invoice-page.html">
                                <i class="ni ni-bullet-list-67 text-success"></i>
                                Invoice Page
                            </a>
                            <a class="dropdown-item" href="../examples/checkout-page.html">
                                <i class="ni ni-basket text-orange"></i>
                                Checkout Page
                            </a>
                            <a class="dropdown-item"  href="javascript:void(0)">
                                <i class="ni ni-chat-round text-primary"></i>
                                Log out
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
