@extends('inc.user._main')
<?php $usernameTag = htmlspecialchars($technician->user->name); ?>
@section('title',"- $usernameTag")

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
