@extends('frontend.layouts.app')

@section('content')
<!-- ***** Main Banner Area Start ***** -->
@include('frontend.layouts.partials.banner')

<!-- ***** Main Banner Area End ***** -->
<!-- ***** About Area Starts ***** -->
@include('frontend.pages.about')

<!-- ***** About Area Ends ***** -->

<!-- ***** Menu Area Starts ***** -->
@include('frontend.pages.menu')

<!-- ***** Menu Area Ends ***** -->

<!-- ***** Chefs Area Starts ***** -->
@include('frontend.pages.chefs')

<!-- ***** Chefs Area Ends ***** -->

<!-- ***** Reservation Us Area Starts ***** -->
@include('frontend.pages.reservation')

<!-- ***** Reservation Area Ends ***** -->

<!-- ***** Menu Area Starts ***** -->
@include('frontend.pages.offers')

<!-- ***** Chefs Area Ends ***** -->
@endsection
