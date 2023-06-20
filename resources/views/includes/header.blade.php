<!-- bg-body-tertiary - бекграунд светлосерый, был в  теге nav -->
<!-- container-fluid - контейнер во всю ширину прибитый к краям всегда, был сразу после nav -->

<header class="p-3 mb-3 border-bottom">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="{{ route('index') }}" class="nav-link {{ activeLink('index') }} navbar-brand">
            {{ config('app.name') }}
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> {{--toggler переключение мобильного меню--}}
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Home отображать для авторизованного пользователя -->
            {{-- @auth --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ activeLink('home') }}" aria-current="page">{{ __('Home') }}</a>
                </li>
			</ul>
            {{-- @endauth --}}
            <ul class="navbar-nav mb-2 mb-lg-0">
                <!-- User_Name и Logout отображать для авторизованного пользователя -->
                {{-- @auth --}}
                <li class="nav-item">
                    <a class="nav-link {{ activeLink('profile') }}" aria-current="page" href="{{ route('profile') }}">{{ __('User_Name') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Logout') }}</a>
                </li>
                {{-- @endauth --}}
                <!-- Login отображать для неавторизованного пользователя -->
                {{-- @guest --}}
                <li class="nav-item ">
                    <a class="nav-link {{ activeLink('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                {{-- @endguest --}}
            </ul>    
        </div>
    </div>
  </nav>
</header>
