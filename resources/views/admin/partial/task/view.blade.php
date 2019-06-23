@extends('inc.admin._main')
<?php $usernameTag = htmlspecialchars($user->name); ?>
@section('title',"- $usernameTag")

@section('style')

@endsection

@section('content')
    @if(Auth::user()->my_status === 'active')
        <router-view></router-view>
    @else
        <div class="submit text-center">
            @include('inc.admin.components.alert_permission')
        </div>
    @endif
@endsection

@section('script')

@endsection
