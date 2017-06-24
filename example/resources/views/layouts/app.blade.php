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
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->
</head>
<body>

    @component('components.nav.nav',
    [
        'brand' => [config('app.name', 'Biobegrippen'), url('/')]
    ])
    @endcomponent

    <div class="main-content container center-block mb-5" id="app">
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
        // Url parameter helper
        $.urlParam = function(name){
            let results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results === null){
                return null;
            }
            else{
                return decodeURI(results[1]) || 0;
            }
        };

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
