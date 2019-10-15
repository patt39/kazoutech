<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@auth
<meta name="userID" content="{{ auth()->user()->id }}">
@endauth
<script>window.Kazoutech = { csrfToken: '{{ csrf_token() }}' }; </script>
<script>
    window.user = {!! json_encode([
    'user' => auth()->user(),
    'guest' => auth()->guest(),
    'authcheck' => auth()->check(),
    ]) !!}
</script>

<title>{{ config('app.name') }} @yield('title')</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="/assets/site/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
<link href="/assets/site/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Argon CSS -->
<link type="text/css" href="/assets/site/assets/css/argon.css?v=1.1.0" rel="stylesheet">


@section('style')
@show

