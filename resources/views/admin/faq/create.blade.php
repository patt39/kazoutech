@extends('inc.admin._main')
@section('title', '- Admin Create Faqs')
@section('sectionTitle', 'Faqs site')

@section('style')

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