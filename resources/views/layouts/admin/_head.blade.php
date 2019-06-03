<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<meta http-equiv="refresh" content="3600"  URL="{{ config('app.url') }}">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>window.Kazoucoin = { csrfToken: '{{ csrf_token() }}' }; </script>
<script>
    window.App = {!! json_encode([
    'user' => auth()->user(),
    ]) !!}
</script>

<title>{{ config('app.name') }} @yield('title')</title>
<!-- Fonts -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/css/material-dashboard.min.css?v=2.1.0">
<link rel="stylesheet" href="/assets/dashboard/assets/css/dashboard-style.css">
<link rel="stylesheet" href="/assets/dashboard/assets/css/plugins/animate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">


@section('style')
    @show

