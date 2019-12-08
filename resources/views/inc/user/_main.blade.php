<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('layouts.user._head')

    @yield('style')
</head>
<body>

<div id="app">

    @include('inc.user.nav_site')
    @section('content')


    @show

</div>

@include('layouts.user._script')

@yield('script')
</body>
</html>
