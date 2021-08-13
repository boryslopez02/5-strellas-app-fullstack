<nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm py-0 px-xl-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="img/logo.png" class="img-fluid">
            <!-- {{ config('app.name', 'Laravel') }} -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li><a href="" class="nav-link">Información</a></li>
                <li><a href="" class="nav-link">Precios</a></li>
                <li><a href="" class="nav-link">Funcionamiento</a></li>
                <li><a href="" class="nav-link">Ganar Dinero</a></li>
                <li><a href="" class="nav-link">Afiliados(50%)</a></li>
                <li><a href="" class="nav-link">Ayuda</a></li>
                <li><a href="" class="nav-link">Tienda</a></li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline nav-link">Home</a>
                        </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline nav-link">Log in</a>
                                </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="text-sm text-gray-700 underline nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                    @else
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>