@extends('inc.user._main')
<?php $usernameTag = htmlspecialchars($user->name); ?>
@section('title',"- $usernameTag")

@section('style')

@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <router-view></router-view>
@endsection

