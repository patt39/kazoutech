@extends('inc.admin._main')
<?php $usernameTag = htmlspecialchars($tag->title); ?>
@section('title',"- $usernameTag")


@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @if(Auth::user()->my_status === 'active')
        <transition name="fade">
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>
    @else
        <div class="submit text-center">
            <error-404></error-404>
        </div>
    @endif
@endsection

@section('script')

@endsection