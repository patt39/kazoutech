@extends('inc.admin._main')
<?php $usernameTag = htmlspecialchars($tag->title); ?>
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