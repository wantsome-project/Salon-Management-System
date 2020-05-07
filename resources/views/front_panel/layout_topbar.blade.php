<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="/frontpanel">Company name</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/services">Services</a>
        <a class="p-2 text-dark" href="/products">Products</a>
        <a class="p-2 text-dark" href="/staff">Staff</a>
        <a class="p-2 text-dark" href="/contact">Contatct</a>
    </nav>
    <!-- Authentication Links -->
    @guest
        <a class="btn btn-outline-primary mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
        @if (Route::has('register'))
            <a class="btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @endguest
</div>
