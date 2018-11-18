<header id="header" class="@yield('alt')">
    <h1>@yield('title')</h1>
    <nav id="nav">
        <ul>
            <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                    <ul>
                        @if(Auth::guard('admin')->check())
                            <li><a href="{{ route('admin.dashboard') }}">Panel Administratora</a></li>
                            <li><a href="{{ route('admin.pizzalist') }}">Zarządzanie pizzami</a></li>
                            <li><a href="{{ route('admin.userlist') }}">Zarządzanie użytkownikami</a></li>
                            <li><a href="#">Bieżące zamówienia</a></li>
                            <li><a href="#">Podsumowanie finansowe</a></li>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#">Statystyki</a></li>
                            <li><a href="{{ route('logout') }}">Wyloguj</a></li>
                        @elseif(Auth::guard('web')->check())
                            <li><a href="{{route('client.dashboard')}}">Panel Klienta</a></li>
                            <li><a href="#">Zamów</a></li>
                            <li><a href="#">Edytuj profil</a></li>
                            <li><a href="{{ route('logout') }}">Wyloguj</a></li>
                        @else
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('pages.pizzalist') }}">Zobacz Menu</a></li>
                            <li><a href="#cta">Zamów online</a></li>
                            <li><a href="{{ route('register') }}">Zarejestruj się</a></li>
                            <li><a href="{{ route('login') }}">Zaloguj się</a></li>
                            <li><a href="{{ route('admin.login') }}">Logowanie Administratora</a></li>
                        @endif
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>