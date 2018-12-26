@extends('main')
@section('title', 'Zmiana hasła')
@section('content')
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <section>
                    <header>
                        <h4>Zmień hasło</h4>
                        <p>Zmień swoje hasło</p>
                        <hr>
                    </header>
                </section>
                <section>
                    @include('partials._messages')
                    <form method="post" action="{{ route('client.dochangepassword') }}">
                        @csrf

                        <h4>Zmiana hasła</h4>
                        <div class="row uniform">
                            <div class="12u$">
                                <input type="password" name="current-password" value="" placeholder="Obecne hasło"/>
                            </div>
                            <div class="12u$">
                                <input type="password" name="new-password" value="" placeholder="Nowe hasło"/>
                            </div>
                            <div class="12u$">
                                <input type="password" name="new-password_confirmation" value="" placeholder="Potwierdź hasło"/>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Zmień hasło" class="button special green"/></li>
                                    <li><input type="reset" value="Wyczyść"/></li>
                                    <li><a href="{{ route('client.edit') }}" class="button special red fix-margin-top">Powrót</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection