<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel Project</title>
    @include("front_panel.layout_head")
</head>

<body>
@include("front_panel.layout_topbar")
<div class="container">
    <h1 class="h2">@yield('header', "To do content")</h1>
    @yield('content')
    @include("front_panel.layout_footer")
</div>
</body>
@extends("front_panel.layout_scripts")

</html>
