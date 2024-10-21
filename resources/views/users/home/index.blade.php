@extends('users.index')
@section('name')
    @include('users.home.section_banner')
    @include('users.home.section_about')
    @include('users.home.section_service')
    @include('users.home.section_feedback')
    {{-- @include('users.home.section_client') --}}
    @include('users.home.section_team')
    @include('users.home.section_news_faq')
    @include('users.home.section_contact')
   
@endsection
