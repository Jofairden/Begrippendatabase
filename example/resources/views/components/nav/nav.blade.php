<nav class="navbar navbar-toggleable-md navbar-light">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ $brand[1] }}">
            {{ $brand[0] }}
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @component('components.nav.nav-item')
                    @slot('text', 'Categorieën')
                    @slot('link', route('categories.index'))
                @endcomponent
                @component('components.nav.nav-item')
                    @slot('text', 'Onderwijsniveaus')
                    @slot('link', route('educations.index'))
                @endcomponent
                @component('components.nav.nav-item')
                    @slot('text', 'API')
                    @slot('link', route('api.index'))
                @endcomponent
                @component('components.nav.nav-account',
                [
                    'text'      => 'Account',
                    'login'     => ['Log in', route('login')],
                    'logout'    => ['Log uit', route('logout')],
                    'register'  => ['Registreer', route('register')],
                ])
                @endcomponent
            </ul>
        </div>
    </div>
</nav>