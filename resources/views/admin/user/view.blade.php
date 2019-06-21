@extends('inc.admin._main')
<?php $usernameTag = htmlspecialchars($user->name); ?>
@section('title',"- $usernameTag")


@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @if(Auth::user()->my_status === 'active')
        <router-view></router-view>
    @else
        <div class="submit text-center">
            @include('inc.admin.alert_permission')
        </div>
    @endif
@endsection

@section('script')

@endsection