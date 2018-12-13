@extends('main')
@section('title', 'Panel Administratora')
@section('content')
<article id="main">
    <section class="wrapper style5 fancy-back">
        <div class="inner white-back">
            <section>
                <header>
                    <h4>Panel Administratora</h4>
                    <p>Zarządzanie przedsiębiorstwem</p>
                    <hr>
                </header>
            </section>
            <section>
                <h5>Pizzeria</h5>
                <div class="row">
                    <div class="12u">
                        <ul class="actions vertical">
                            <li><a href="{{ route('admin.pizzalist') }}" class="button fit">Zarządzanie pizzami</a></li>
                            <li><a href="{{ route('admin.userlist') }}" class="button fit">Zarządzanie użytkownikami</a></li>
                            <li><a href="{{ route('admin.orderstrack') }}" class="button fit">Obsługa zamówień</a></li>
                            <li><a href="{{ route('admin.finances') }}" class="button fit">Podsumowanie finansowe</a></li>
                            <li><a href="{{ route('admin.feedbacks') }}" class="button fit">Feedback</a></li>
                            <li><a href="#" class="button fit">Statystyki</a></li>
                            <li><a href="{{ route('logout') }}" class="button fit">Wyloguj</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </section>
</article>
@endsection