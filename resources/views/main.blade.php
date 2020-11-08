@extends('layouts.app') 

@section('title'){{$tour->title}} @endsection

@section('content')
        @include('frontpage.navbar')
        @include('frontpage.mainpage')
    @if($closestArrival->name!=null)
        @include('frontpage.about')
        @include('frontpage.clouds')
        @include('frontpage.take')
        @include('frontpage.forgroup')
        @include('frontpage.momentsslider')
        @include('frontpage.footer')
    @endif
@endsection
