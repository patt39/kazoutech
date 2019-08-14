<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.admin._head')

    @yield('style')
</head>
<body>


<div class="wrapper" id="app">

    @if(Auth::user()->my_status === 'active')
        @include('inc.admin.navadmin')

    @section('content')


    @show

    @endif

</div>

@include('layouts.admin._script')

@yield('script')
</body>
</html>
