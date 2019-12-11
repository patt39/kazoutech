@extends('inc.user._main')
<?php $item = htmlspecialchars('Occupations et services à la persone : trouver un jobber facillement kazoutech');?>
@section('title', $item)

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <router-view></router-view>
@endsection

@section('script')

@endsection
