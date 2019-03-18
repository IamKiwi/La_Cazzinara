@extends('main')

@section('title', 'Panel klienta')

@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5 fancy-back">
                <div class="inner white-back">
                    @include('partials._messages')
                    <section>
                        <header>
                            <h2>Witaj {{ Auth::user()->name }}</h2>
                        </header>
                    </section>
                    <section>
                        <div class="row">
                            <div class="12u">
                                <ul class="actions vertical">
                                    <li><a href="{{ route('client.orderonline') }}" class="button dark fit">Zamów</a></li>
                                    <li><a href="{{ route('client.edit')}}" class="button dark fit">Edytuj Profil</a></li>
                                    <li><a href="{{ route('client.history') }}" class="button dark fit">Historia zamówień</a></li>
                                    <li><a href="{{ route('logout') }}" class="button dark fit">Wyloguj</a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </article>
    </div>
@endsection