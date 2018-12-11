@extends('main')
@section('title', 'Moja opinia')
@section('content')
    <article id="main">
        <section class="wrapper style5 wooden-back">
            <div class="inner">
                <section>
                    <header>
                        <h4>Moja opinia</h4>
                        <p>Przeczytaj wystawioną opinię</p>
                        <hr>
                    </header>
                </section>
                <section>
                    @include('partials._messages')
                        <div class="row uniform">
                            <div class="12u 12u$(xsmall)">
                                <label for="grade">Rodzaj oceny</label>
                                @if($feedback->grade === 'positive')
                                    <p class="menu-green">Pozytywna</p>
                                @elseif($feedback->grade === 'neutral')
                                    <p class="menu-blue">Neutralna</p>
                                @else
                                    <p class="menu-red">Negatywna</p>
                                @endif
                            </div>
                            <div class="12u 12u$(xsmall)">
                                <label for="opinion_type">Rodzaj opinii</label>
                                @if($feedback->public === 'true')
                                    <p class="menu-green">Publiczna</p>
                                @else
                                    <p class="menu-blue">Prywatna</p>
                                @endif
                            </div>
                            <div class="12u 12u$(xsmall)">
                                <label for="feedback">Opinia</label>
                                <p>{{ $feedback->message }}</p>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><a href="{{ route('client.history') }}" class="button special red fix-margin-top">Powrót</a></li>
                                </ul>
                            </div>
                        </div>
                </section>
            </div>
        </section>
    </article>
@endsection