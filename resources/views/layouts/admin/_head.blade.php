<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@auth
    <meta name="userID" content="{{ auth()->user()->id }}">
@endauth
<script>window.Kazoucoin = { csrfToken: '{{ csrf_token() }}' }; </script>
<script>
    window.user = {!! json_encode([
    'user' => auth()->user(),
    'roles' => auth()->user()->roles,
    'permissions' => auth()->user()->getAllPermissions(),
    ]) !!}
</script>

<title>{{ config('app.name') }} @yield('title')</title>
<!-- Fonts -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/css/material-dashboard.css?v=2.1.0">
<link rel="stylesheet" href="/assets/dashboard/assets/css/dashboard-style.css">
<link rel="stylesheet" href="/assets/dashboard/assets/css/plugins/animate.css">
<link rel="stylesheet" href="/assets/dashboard/assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">


@section('style')
    @show

