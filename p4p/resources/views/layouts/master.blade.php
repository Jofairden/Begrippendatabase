<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
       Biobegrippen - @yield('title') 
    </title>

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    @yield('styles')

    @yield('scripts')

</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">Biobegrippen</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=" {{ url('/list') }}">Begrippen</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </a>
            @if (Route::has('login'))
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @if (Auth::check())
                        <a class="dropdown-item" href="{{ url('/manage') }}">Beheren</a>
                    @else
                        <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                        <a class="dropdown-item" href="{{ url('/register') }}">Registreer</a>
                    @endif
                </div>
            @endif
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Zoeken</button>
        </form>
      </div>
      </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>
            &copy; Biologische begrippen databank - 2017 (Een service van het Biologielokaal van de
            stichting De Digitale School, ontwikkeld door Dani&euml;l Zondervan, Max Antonissen en Jesse van der Bijl)
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    @yield('scripts-end')
</body>
</html>