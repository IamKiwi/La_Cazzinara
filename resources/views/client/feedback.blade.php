@extends('main')
@section('title', 'Wystaw opinię')
@section('content')
    <article id="main">
        <section class="wrapper style5 wooden-back">
            <div class="inner">
                <section>
                    <header>
                        <h4>Wystaw opinię</h4>
                        <p>Powiedz, co sądzisz o danym zamówieniu</p>
                        <hr>
                    </header>
                </section>
                <section>
                    @include('partials._messages')

                    <form method="post" action="{{ route('client.savefeedback') }}">
                        @csrf
                        <h4>Wystawianie opinii</h4>
                        <div class="row uniform">
                            <div class="12u 12u$(xsmall)">
                                <label for="grade">Rodzaj oceny</label>
                                <select name="grade">
                                    <option value="positive" selected>Pozytywna</option>
                                    <option value="neutral">Neutralna</option>
                                    <option value="negative">Negatywna</option>
                                </select>
                            </div>
                            <div class="12u 12u$(xsmall)">
                                <label for="opinion_type">Rodzaj opinii</label>
                                <select name="opinion_type">
                                    <option value="true" selected>Publiczny</option>
                                    <option value="false">Prywatny</option>
                                </select>
                            </div>
                            <div class="12u 12u$(xsmall)">
                                <label for="feedback">Wiadomość</label>
                                <textarea name="feedback" placeholder="Treść" rows="6"></textarea>
                                <input type="hidden" name="oid" value="{{ $oid }}">
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Wystaw opinię" class="button special green" /></li>
                                    <li><a href="{{ route('client.history') }}" class="button special red fix-margin-top">Anuluj</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection