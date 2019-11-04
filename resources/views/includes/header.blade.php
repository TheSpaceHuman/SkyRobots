<header class="header">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('images/logo.svg') }}" alt="SkyRobotsLogo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <div class="d-flex align-items-center ml-auto">
                    @auth
                        <span class="balance">Ваш баланс: {{ Auth::user()->money }} $</span>
                        <div class="avatar">
                            <a href="{{ route('page.profile') }}">
                                <img class="avatar__img" src="{{ Auth::user()->getAvatar() }}" alt="{{  Auth::user()->name }}">
                            </a>
                        </div>
                    @endauth
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if( Auth::user()->role === 'admin')<a class="dropdown-item text-primary" href="{{ route('admin.page.dashboard') }}">Административная панель</a>@endif
                                    <a class="dropdown-item" href="{{ route('page.dashboard') }}">Личный кабинет</a>
                                    <a class="dropdown-item" href="{{ route('page.profile') }}">Мой профиль</a>
                                    <a class="dropdown-item" href="{{ route('page.profile') }}">Мои лицензии</a>
                                    <a class="dropdown-item" href="{{ route('page.profile') }}">Мои партнеры</a>
                                    <a class="dropdown-item" href="{{ route('page.profile') }}">Мои возможности</a>
                                    <a class="dropdown-item" href="{{ route('page.profile') }}">Мои доходы</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
