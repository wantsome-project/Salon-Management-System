<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name', 'Beauty salon') }}</title>

        @include("back_panel.layout_head")
    </head>
    <body style="background-image:  url('assets/1.jpg')">
        @include("back_panel.layout_navbar")

        <div class="container-fluid">
            <div class="row">
                @include("back_panel.layout_sidebar")
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @foreach(["success", "warning", "danger"] as $log_status)
                        @if (session()->has($log_status))
                            <div class="alert alert-{{ $log_status }}">
                                {{ session()->get($log_status) }}
                            </div>
                        @endif
                    @endforeach

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 w-100">@yield('header', "Welcome!")</h1>
                    </div>
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="row">
                        <div class="col-10 offset-2">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
    @include("back_panel.layout_scripts")
</html>
