@extends('main')
@section('alt', 'alt')
@section('title', 'La Cazzinara')
@section('content')
    <section id="banner">
        <div class="inner">
            <h2>La Cazzinara</h2>
            <p>
                Jedyna pizzeria<br/>
                z długoletnią włoską tradycją!<br/>
            </p>

            <ul class="actions">
                <li><a href="{{ route('pages.pizzalist') }}" class="button special green force-white">Zobacz Menu</a></li>
                <li><a href="#cta" class="button special white scrolly force-black">Zamów Online</a></li>
                <li><a href="/register" class="button special">Zarejestruj się</a></li>
            </ul>
        </div>
        <a href="#two" class="more scrolly">Poznaj nasze pizze</a>
    </section>
    <!-- Two -->
    <section id="two" class="wrapper alt style2">
        <section class="spotlight wooden">
            <div class="image"><img src="images/pizza01.jpg" alt=""/></div>
            <div class="content">
                <h2>Odpowiedni dobór serów<br/>
                    gwarancją najwyższej jakości</h2>
                <p>Dobre ciasto to podstawa pizzy ale to właśnie ser jest dominującym jej elementem. Nasi kucharze
                    dodają do pizzy tylko najlepsze
                    rodzaje sera.</p>
            </div>
        </section>
        <section class="spotlight wooden">
            <div class="image"><img src="images/pizza02.jpg" alt=""/></div>
            <div class="content">
                <h2>Zawsze świeże i starannie<br/>
                    wyselekcjonowane składniki</h2>
                <p>Świeże warzywa i mięso to składniki gwarantujące niepowtarzalny smak. Dbamy o jakość od samego
                    początku.</p>
            </div>
        </section>
        <section class="spotlight wooden">
            <div class="image"><img src="images/pizza03.jpg" alt=""/></div>
            <div class="content">
                <h2>Unikalne połączenie pasji<br/>
                    i umiejętności włoskich kucharzy</h2>
                <p>Wieloletnie doświadczenie włoskich szefów kuchnii połączone z ich miłością do gotowania
                    sprawi, że zjesz najlepszą pizze na świecie.</p>
            </div>
        </section>
    </section>

    <section id="cta" class="wrapper style4 promo">
        <div class="inner">
            <header>
                <h2>Głodny? Zamów Online</h2>
                <p>Przed dokonaniem zamówienia musisz zalogować się na swoje konto. <br>
                    Nie masz jeszcze konta? Zarejestruj się</p>
            </header>
            <ul class="actions vertical">
                <li><a href="/login" class="button fit special">Logowanie</a></li>
                <li><a href="/register" class="button fit">Rejestracja</a></li>
            </ul>
        </div>
    </section>

    <section class="wrapper style4 spotlight wooden">
        <div class="inner">
            <div id="carouseria" style="border-radius: 7px;">
                <div class="carouseria-item">
                    <div class="item-style">
                        <h2>Przeczytaj co sądzą o nas nasi klienci</h2>
                        <p>Oto 5 losowych opinii naszych klientów</p>
                    </div>
                </div>

                @foreach($feedback as $f)
                    <div class="carouseria-item">
                        <div class="item-style">
                            <h2>Użytkownik {{ $f->user[0]->name }} pisze: </h2>
                            <p>{{ $f->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script src="{{ URL::asset('assets/js/carouseria.min.js') }}"></script>
    <script>
        setCarousel("250px true horizontal false true true");
        window.setInterval(function(){
            next();
        }, 5000);
    </script>
@endsection
