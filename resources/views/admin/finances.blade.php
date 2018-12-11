@extends('main')

@section('title', 'Podsumowanie finansowe')

@section('content')
<div id="page-wrapper">
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <header>
                        <h4>Panel Administratora</h4>
                        <h5>Podsumowanie finansowe</h5>
                        <hr>
                    </header>
                </section>
                <section>
                    <h4>Zyski</h4>
                    <p>Wszystkie zamówienia o statusie zrealizowanych</p>
                    <h2 style="color: green">{{ number_format($net , 2, '.', ' ') }}</h2>

                    <h4>Straty</h4>
                    <p>Wszystkie zamówienia które odrzucono lub zostały odmówione przez klienta</p>
                    <h2 style="color: red">{{ number_format($loss, 2, '.', ' ') }}</h2>

                    <h4>Bilans</h4>
                    <p>Zyski minus straty</p>
                    <h2 style="color: dodgerblue">{{ number_format($balance, 2, '.', ' ')}}</h2>

                    <a href="{{ route('admin.dashboard') }}" class="button special red fix-margin-top">Powrót</a>
                </section>
            </div>
        </section>
    </article>
</div>
@endsection