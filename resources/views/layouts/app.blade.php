<!DOCTYPE HTML>
<html>
<head>
    <title>Підтримка</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

@stack('header-styles')

@include('layouts.header')

@yield('content')

@include('layouts.footer')
