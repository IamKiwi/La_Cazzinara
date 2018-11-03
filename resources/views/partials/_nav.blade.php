<header id="header" class="@yield('alt')">
    <h1><a href="index.html">@yield('title')</a></h1>
    <nav id="nav">
        <ul>
            <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                    <ul>
                        @if(Request::is('admin'))
                            <li><a href="#">Zarządzanie pizzami</a></li>
                            <li><a href="#">Zarządzanie użytkownikami</a></li>
                            <li><a href="#">Bieżące zamówienia</a></li>
                            <li><a href="#">Podsumowanie finansowe</a></li>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#">Statystyki</a></li>
                        @elseif(Request::is('debug'))
                            <p>Nic tu nie ma :)</p>
                        @else
                            <li><a href="/">Home</a></li>
                            <li><a href="/pizzalist">Zobacz Menu</a></li>
                            <li><a href="#cta">Zamów online</a></li>
                            <li><a href="/register">Zarejestruj się</a></li>
                            <li><a href="/login">Zaloguj się</a></li>
                        @endif
                        <li><a href="/debug">Tryb Boga</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>