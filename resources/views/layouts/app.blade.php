<!DOCTYPE HTML>
<html>
<head>
    <title>Підтримка</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="icon" href="{{ asset('villa-lascala.jpg') }}" sizes="32x32">--}}

    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/aos/aos.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/select2/select2.min.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/swiper/swiper.min.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/magnific-popup/magnific.popup.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/fontello.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/remodal/remodal.css') }}"/>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('libs/remodal/remodal-default-theme.css') }}"/>--}}

@stack('header-styles')

<body class="@yield('main-page-class')">

@include('layouts.header')

@yield('content')

@include('layouts.footer')
