@extends('inc.admin._main')
<?php $usernameTag = htmlspecialchars($user->username); ?>
@section('title',"- $usernameTag")


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