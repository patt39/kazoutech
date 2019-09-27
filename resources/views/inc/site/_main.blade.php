<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.site._head')

    @yield('style')
</head>
<body>
@include('inc.site.nav-site')

<div class="wrapper" id="app">



        @section('content')


        @show


</div>

@include('inc.site.footer-site')

@include('layouts.site._script')

@yield('script')
</body>
</html>