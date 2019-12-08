<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('layouts.site._head')

    @yield('style')
</head>
<body>

<div id="app">


    @section('content')


    @show

</div>

@include('layouts.site._script')

@yield('script')
</body>
</html>
