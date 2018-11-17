@extends('main')

@section('title', 'Panel klienta')

@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5">
                <div class="inner">
                    <section>
                        <header>
                            <h2>Witaj {{ Auth::user()->name }}</h2>
                        </header>
                    </section>
                    <section>
                        <div class="row">
                            <div class="12u">
                                <ul class="actions vertical">
                                    <li><a href="#" class="button fit">Zamów</a></li>
                                    <li><a href="#" class="button fit">Edytuj Profil</a></li>
                                    <li><a href="#" class="button fit">Historia zamówień</a></li>
                                    <li><a href="{{ route('logout') }}" class="button fit">Wyloguj</a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </article>
    </div>
@endsection