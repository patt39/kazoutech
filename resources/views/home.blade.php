@extends('inc.user._main')
<?php $item = htmlspecialchars(config('app.name'));?>
@section('title', $item .' Home page')

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
