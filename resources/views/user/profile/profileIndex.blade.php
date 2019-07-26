@extends('inc.user._main')
<?php $usernameTag = htmlspecialchars($user->name); ?>
@section('title',"-View profile $usernameTag")

@section('style')

@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <div id="app">
        <router-view></router-view>
    </div>
@endsection
