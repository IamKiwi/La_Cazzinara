@extends('main')

@section('title', 'Zarządzanie pizzami')
@section('content')
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <header>
                        <h4>Panel Administratora</h4>
                        <h5>Pizze</h5>
                        <p>Dodawaj, edytuj, usuwaj pizze</p>
                        <hr>
                    </header>
                </section>
                <section>
                    @include('partials._messages')
                    <form id="searchForm">
                        <div class="row uniform">
                            <div class="3u 12u$(xsmall)">
                                <input type="text" name="pizzaSearch" placeholder="Nazwa pizzy" value="" />
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <button type="submit">Szukaj</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-wrapper">
                        <h4>Nasze pizze</h4>
                        <table class="table lower-font">
                            <thead>
                            <tr>
                                <th>Nazwa</th>
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
                                <td><a href="{{ route('admin.pizzaedit', $p->id) }}" class="btn btn-info btn-sm">Edytuj</a></td>
                                <td><a href="{{ route('admin.pizzadelete', $p->id) }}" class="btn btn-danger btn-sm">Usuń</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $pizza->links() !!}
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row uniform">
                        <ul class="actions">
                            <li><a href="{{route('admin.addpizza')}}" class="button special green">Dodaj nową pizze</a></li>
                            <li><a href="/admin" class="button special">Powrót</a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
    </article>
@endsection