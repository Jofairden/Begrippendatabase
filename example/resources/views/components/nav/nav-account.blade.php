<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $text }} <span class="caret"></span>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @if (!Auth::check())
            <a href="{{ $login[1] }}" class="dropdown-item">{{ $login[0] }}</a>
            <a href="{{ $register[1] }}" class="dropdown-item">{{ $register[0] }}</a>
        @else
            <a href="{{ $profile[1] }}" class="dropdown-item">{{ $profile[0] }}</a>
            <a href="{{ $notes[1] }}" class="dropdown-item">{{ $notes[0] }}</a>
            <a href="{{ $perms[1] }}" class="dropdown-item">{{ $perms[0] }}</a>
            <a href="{{ $logout[1] }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">{{ $logout[0] }}</a>
            <form id="logout-form" action="{{ $logout[1] }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
</li>