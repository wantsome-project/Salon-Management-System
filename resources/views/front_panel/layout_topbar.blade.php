<nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand p-2 text-dark" href="{{ route('home_page') }}">{{ config('app.name', 'Beauty salon') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link p-2 text-dark" href="{{ route("service_types") }}">Services</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link p-2 text-dark" href="{{ route("products") }}">Products</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link p-2 text-dark {{ request()->routeIs('front_panel.pages.staff*') ? 'active' : ""}} " href="{{ route("staff") }}">Team</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link p-2 text-dark" href="{{ route('contact') }}">Contact</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link p-2 text-dark" href="">Appointment</a>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth
                        {{  Auth::user()->name }}
                    @else
                        Log In or Register
                    @endauth
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <!-- Authentication Links -->
                    @guest
                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        {!! Form::open(['url'=>route('logout')]) !!}
                        @csrf

                        <button type="submit" class="dropdown-item">Sign out</button>
                        {!! Form::close() !!}
                    @endguest
                </div>
            </li>
        </ul>
    </div>
</nav>
