@extends('main')

@section('title', 'Nasze menu')

@section('content')
    <article id="main">
        <section class="wrapper style5 wooden-back">
            <div class="inner">
                <h2>Menu</h2>
                <p class="lead">Przeglądaj menu i wybierz coś dla siebie</p>
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Nazwa Pizzy</th>
                            <th>Składniki</th>
                            <th>Mała (35cm)</th>
                            <th>Duża (50cm)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pizza as $p)
                            <tr>
                                <td>{{$p->Nazwa}}</td>
                                <td>{{$p->Skladniki}}</td>
                                <td>{{$p->Cena_mala}}</td>
                                <td>{{$p->Cena_duza}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="/" class="button special red">Powrót</a>
                </div>
            </div>
        </section>
    </article>
@endsection