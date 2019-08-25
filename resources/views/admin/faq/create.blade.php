@extends('inc.admin._main')
@section('title', '- Admin Create Faqs')
@section('sectionTitle', 'Faqs site')

@section('style')

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