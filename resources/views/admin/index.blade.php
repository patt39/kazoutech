@extends('inc.admin._main')
@section('title', '| Dashboard Administration')
@section('sectionTitle', 'Dashboard')
@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <transition name="fade">
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
    </transition>
@endsection

@section('script')

@endsection