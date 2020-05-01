<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel Project</title>
    <link rel="stylesheet" href="/assets/fontawesome_5.13/css/all.css">

    @include("front_panel.layout_head")
</head>

<body>
    @include("front_panel.layout_topbar")
    @yield('content')
    @include("front_panel.layout_footer")
</body>
@extends("back_panel.layout_scripts")

</html>
