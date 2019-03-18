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
                            <li><a href="{{ route('admin.pizzalist') }}" class="button dark fit">Zarządzanie pizzami</a></li>
                            <li><a href="{{ route('admin.userlist') }}" class="button dark fit">Zarządzanie użytkownikami</a></li>
                            <li><a href="{{ route('admin.orderstrack') }}" class="button dark fit">Obsługa zamówień</a></li>
                            <li><a href="{{ route('admin.finances') }}" class="button dark fit">Podsumowanie finansowe</a></li>
                            <li><a href="{{ route('admin.feedbacks') }}" class="button dark fit">Feedback</a></li>
                            <li><a href="{{ route('admin.stats') }}" class="button dark fit">Statystyki</a></li>
                            <li><a href="{{ route('logout') }}" class="button dark fit">Wyloguj</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </section>
</article>
@endsection