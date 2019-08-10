<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/">
            Kazoutech
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{ __('Demander un service') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{ __('Devenir un bosseur') }}
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <router-link  :to="{ name: 'login' }" class="nav-link">
                        {{ __('Connexion') }}
                    </router-link>
                </li>
                    @if (Route::has('register'))
                <li class="nav-item">
                    <router-link  :to="{ name: 'register' }" class="nav-link">
                        {{ __('Inscription') }}
                    </router-link>
                </li>
                     @endif
                @else
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset(auth()->user()->avatar ) }}" alt="{{ Auth::user()->email }}"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"> <b>{!! str_limit(Auth::user()->email, 12,'...') !!}</b>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{route('dashboard.index')}}" class="dropdown-item">
                            <b>{{ __('Dashboard') }}</b>
                        </a>
                        <router-link  :to="{ path: `/${user.username}` }" class="dropdown-item">
                            <b> {{ __('Profile') }}</b>
                        </router-link>

                        <router-link  :to="{ path: `/profile/edit` }" class="dropdown-item">
                            <b> {{ __('Paramètres') }}</b>
                        </router-link>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <b>Deconnexion</b>
                        </a>
                    </div>
                </li>
            @endguest
                <!--<li class="nav-item">
                    <router-link  :to="{ name: 'contact_cm' }" class="nav-link">
                        Contact
                    </router-link>
                </li>-->
            </ul>
        </div>
    </div>
</nav>