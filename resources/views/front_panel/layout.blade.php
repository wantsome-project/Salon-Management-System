<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel Project</title>
    <link rel="stylesheet" href="/assets/fontawesome_5.13/css/all.css">

    @extends("back_panel.layout_head")
</head>

<body>
    @include("front_panel.layout_topbar")

    @include("front_panel.layout_content")

    @include("front_panel.layout_cards")

    @include("front_panel.layout_footer")
</body>
@extends("back_panel.layout_scripts")

</html>
