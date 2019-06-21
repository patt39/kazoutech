@extends('inc.admin._main')
<?php $usernameTag = htmlspecialchars($message->object); ?>
@section('title',"- $usernameTag")

@section('style')

@endsection

@section('content')
    <router-view></router-view>
@endsection

@section('script')

@endsection
