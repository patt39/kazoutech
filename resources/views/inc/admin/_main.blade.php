<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.admin._head')

    @yield('style')
</head>
<body>


<div class="wrapper" id="app">

    @can('dashboard')

    @if(Auth::user()->my_status === 'active')

       <nav-admin></nav-admin>

        <div class="main-panel" id="javascriptComponents">
            <top-nav></top-nav>
            @section('content')


            @show
            <footer-admin></footer-admin>
        </div>

    @endif

        @else
            <div class="submit text-center">
                <error-404></error-404>
            </div>
    @endcan

</div>

@include('layouts.admin._script')

@yield('script')
</body>
</html>
