@extends('main')
@section('title', 'Panel Administratora')
@section('content')
<article id="main">
    <section class="wrapper style5">
        <div class="inner">
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
                            <li><a href="/pizzaedit" class="button fit">Zarządzanie pizzami</a></li>
                            <li><a href="/userlist" class="button fit">Zarządzanie użytkownikami</a></li>
                            <li><a href="#" class="button fit">Bieżące zamówienia</a></li>
                            <li><a href="#" class="button fit">Podsumowanie finansowe</a></li>
                            <li><a href="#" class="button fit">Feedback</a></li>
                            <li><a href="#" class="button fit">Statystyki</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </section>
</article>
@endsection