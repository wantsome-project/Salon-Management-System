<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Beauty salon') }}</title>
    @include("front_panel.layout_head")
</head>

<body>
<div style="background-image: url('assets/img.jpg')">
@include("front_panel.layout_topbar")
@foreach(["success", "warning", "danger"] as $log_status)
    @if (session()->has($log_status))
        <div class="alert alert-{{ $log_status }}">
            {{ session()->get($log_status) }}
        </div>
    @endif
@endforeach
<div class="container">
    <h1 class="h2">@yield('header', "To do content")</h1>
    @yield('content')
    @include("front_panel.layout_footer")
</body>
@extends("front_panel.layout_scripts")

</html>
