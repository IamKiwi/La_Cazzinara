@extends('main')

@section('title', 'Nasze menu')
@section('content')
    <article id="main">
        <section class="wrapper style5 wooden-back">
            <div class="inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Menu</h2>
                        <p class="lead">Przeglądaj menu lub wyszukaj pizze po jej nazwie i wybierz coś dla siebie.</p>
                        <form id="searchForm" action="{{ route('pages.searchpizzalist') }}">
                            <div class="row uniform">
                                <div class="3u 12u$(xsmall)">
                                    <input type="text" name="search" placeholder="Nazwa pizzy" value="" />
                                </div>
                                <div class="3u 12u$(xsmall)">
                                    <button type="submit">Szukaj</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                <tr>
                                    <th>Nazwa Pizzy</th>
                                    <th>Składniki</th>
                                    <th>Mała (35cm)</th>
                                    <th>Średnia (45cm)</th>
                                    <th>Duża (60cm)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pizza as $p)
                                    <tr>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->ingredients}}</td>
                                        <td>{{$p->price_small}}</td>
                                        <td>{{$p->price_medium}}</td>
                                        <td>{{$p->price_large}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {!! $pizza->links() !!}
                        </div>
                        <div class="text-center">
                            <a href="/" class="button special red">Powrót</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection