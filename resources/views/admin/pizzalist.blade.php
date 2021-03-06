@extends('main')

@section('title', 'Zarządzanie pizzami')
@section('content')
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
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
                    <form id="searchForm" action="{{ route('admin.searchpizzalist') }}">
                        <div class="row uniform">
                            <div class="3u 12u$(xsmall)">
                                <input type="text" name="search" placeholder="Nazwa pizzy" value="" />
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <input type="text" name="search2" placeholder="Skladniki" value="" />
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <select name="visible_pizzas">
                                    <option value="" >Wszystkie</option>
                                    <option value="actual" @if(old('visible_pizzas') === 'actual') selected @endif>Tylko w aktualnej ofercie</option>
                                    <option value="trashed" @if(old('visible_pizzas') === 'trashed') selected @endif>Tylko usunięte</option>
                                </select>
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <button type="submit">Szukaj</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-wrapper">
                        <h4>Nasze pizze</h4>
                        <p> Rekordy {{$pizza->firstItem()}} - {{$pizza->lastItem()}} z {{$pizza->total()}}</p>
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
                                @if(empty($p->deleted_at))
                                    <td><a href="{{ route('admin.pizzaedit', $p->id) }}" class="btn btn-info btn-sm">Edytuj</a></td>
                                    <td><a href="{{ route('admin.pizzadelete', $p->id) }}" class="btn btn-danger btn-sm">Usuń</a></td>
                                @else
                                    <td><a href="{{ route('admin.pizzaedit', $p->id) }}" class="btn btn-info btn-sm disabled">Edytuj</a></td>
                                    <td><a href="{{ route('admin.pizzarestore', $p->id) }}" class="btn btn-success btn-sm">Przywróć</a></td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $pizza->links() !!}
                            <hr>
                            <ul class="actions text-center">
                                <li><a href="{{route('admin.addpizza')}}" class="button special green force-black">Dodaj nową pizze</a></li>
                                <li><a href="{{ route('admin.dashboard') }}" class="button special">Powrót</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </article>
@endsection