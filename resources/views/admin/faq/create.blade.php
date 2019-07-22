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
            <error-404></error-404>
        </div>
    @endif
@endsection

@section('script')

@endsection