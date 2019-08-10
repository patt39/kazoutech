<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.user._head')

    @yield('style')
</head>
<body>


<div class="wrapper" id="app">
    @include('inc.user.navesite')
    @section('content')


    @show

</div>

@include('layouts.user._script')

@yield('script')
</body>
</html>