<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">

        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> {{--toggler переключение мобильного меню--}}
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link " aria-current="page">
                        {{ __('Вход')}}
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>
