<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@auth
    <meta name="userID" content="{{ auth()->user()->id }}">
    <script>
        window.user = {!! json_encode([
    'roles' => auth()->user()->roles,
    'permissions' => auth()->user()->getAllPermissions(),
    ]) !!}
    </script>
@endauth
<script>window.Kazoutech = { csrfToken: '{{ csrf_token() }}' }; </script>
<script>
    window.user = {!! json_encode([
    'user' => auth()->user(),
    'guest' => auth()->guest(),
    'authcheck' => auth()->check(),
    ]) !!}
</script>

<title>@yield('title')</title>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- Nucleo Icons -->
<link href="/assets/vendor_site/css/nucleo-icons.css" rel="stylesheet" />
<link href="/assets/vendor_site/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<link href="/assets/vendor_site/css/font-awesome.css" rel="stylesheet" />
<link href="/assets/vendor_site/css/nucleo-svg.css" rel="stylesheet" />
<!-- Argon CSS Files -->
<link rel="stylesheet" href="/assets/dashboard/assets/css/plugins/animate.css">
<link href="/assets/vendor_site/css/argon-design-system.css?v=1.0.0" rel="stylesheet" />
<!-- Customize KazouTech Styles -->
<link href="/assets/css/kazoutech.css" rel="stylesheet" />

@section('style')
@show

