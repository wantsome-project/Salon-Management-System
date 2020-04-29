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
        @extends("back_panel.layout_navbar")

        <div class="container-fluid">
            <div class="row">
                @extends("back_panel.layout_sidebar")
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">@yield('header', "To do content")</h1>
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    @extends("back_panel.layout_scripts")
</html>



