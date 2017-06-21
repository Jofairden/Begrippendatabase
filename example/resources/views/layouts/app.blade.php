<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->

</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-light">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Biobegrippen') }}
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('concepts.index')}}">Begrippen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">Categorieën</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('educations.index')}}">Onderwijsniveaus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('api.index')}}">API</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if (Auth::guest())
                                <a href="{{ route('login') }}" class="dropdown-item">Log in</a>
                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                            @else
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="main-content container mb-5" id="app">
        @yield('content')
    </div>

    <footer>
        <p class="mb-0">
            &copy; Biologische begrippen databank - 2017 (Een service van het Biologielokaal van de stichting De Digitale School)
        </p>
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script>
        // Delay helper
        let delay = (function(){
            let timer = 0;
            return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();</script>
    @yield('scripts')
</body>
</html>
