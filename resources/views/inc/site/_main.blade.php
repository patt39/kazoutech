<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.site._head')

    @yield('style')
</head>
<body>

<div id="app">

    @include('inc.site.nav-site')

    <div class="wrapper">



        @section('content')


        @show


    </div>
</div>

@include('inc.site.footer-site')

@include('layouts.site._script')

@yield('script')
</body>
</html>
