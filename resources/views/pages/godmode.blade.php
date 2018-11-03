@extends('main')
@section('title', 'God mode')
@section('content')
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <header>
                        <h4>Tryb Boga</h4>
                        <p>Gdzie jest bug?</p>
                        <hr>
                    </header>
                </section>
                <section>
                    <h5>Ścieżki</h5>
                    <div class="row">
                        <div class="12u">
                            <ul class="actions vertical">
                                <li><a href="/" class="button fit">Home</a></li>
                                <li><a href="/login" class="button fit">Logowanie</a></li>
                                <li><a href="/register" class="button fit">Rejestracja</a></li>
                                <li><a href="/pizzalist" class="button fit">Menu</a></li>
                                <li><a href="/admin" class="button fit">Panel admina</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </article>
@endsection