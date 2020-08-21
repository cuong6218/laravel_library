<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

@extends('home.layouts.app')
@include('home.particles.header')
{{--@include('home.particles.menu')--}}
@include('home.particles.breadcrumb')
@yield('content')
@include('home.particles.instagram')
@include('home.particles.footer')
</body>
</html>
