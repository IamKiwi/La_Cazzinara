@extends('main')

@section('title', 'Zamów online')

@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5">
                <div class="inner">
                    <section>
                        <h4>Koszyk</h4>
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Składniki</th>
                                    <th>Rozmiar</th>
                                    <th>Cena (szt.)</th>
                                    <th>Liczba</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form method="post" action="#">
                                            @foreach($cart as $c)
                                                <tr>
                                                    <td>{{ $c->name}}</td>
                                                    <td>{{ $c->attributes->ingredients}}</td>
                                                    <td>{{ $c->attributes->size }}</td>
                                                    <td>{{ number_format($c->price , 2, '.', ' ')}}</td>
                                                    <td>{{ $c->quantity }}</td>
                                                    <td><a href="{{ route('client.removefromcart', $c->id) }}" class="btn btn-danger btn-sm">Usuń</a></td>
                                                </tr>
                                            @endforeach
                                    Całkowita kwota zamówienia: <h3>{{ number_format(Cart::getTotal() , 2, '.', ' ')}}</h3>
                                </form>
                                </tbody>
                            </table>
                            {{--{if $numOfPizzas > 0}--}}
                            <br>
                            <a href="#" class="button special green">Zamów</a>
                            <a href="{{ route('client.clearcart') }}" class="button ">Wyczyść</a>
                            <a href="{{ route('client.cancelcart') }}" class="button special red">Anuluj</a>
                            <br>
                        </div>
                    </section>
                    <section>
                        <br>
                        <h4>Wybierz pizze</h4>
                        <div class="inner">
                            <form id="searchForm"
                                  onsubmit="ajaxPostForm('searchForm', '{$conf->action_url}adminTrackOrders', 'table'); return false;">
                                <div class="row uniform">
                                    <div class="3u 12u$(xsmall)">
                                        <input type="text" name="pizzaSearch" placeholder="Nazwa pizzy" value=""/>
                                    </div>
                                    <div class="3u 12u$(xsmall)">
                                        <button type="submit">Szukaj</button>
                                    </div>
                            </form>
                        </div>
                        <div class="table-wrapper">
                            <table class="table lower-font text-center">
                                <thead>
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Składniki</th>
                                    <th>Mała (35cm)</th>
                                    <th>Średnia (45cm)</th>
                                    <th>Duża (50cm)</th>
                                    <th>Rozmiar</th>
                                    <th>Liczba</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pizza as $p)
                                    <form method="post" action="{{ route('client.addtocart') }}">
                                        @csrf

                                        <tr class="text-center">
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->ingredients }}</td>
                                            <td>{{ $p->price_small }}</td>
                                            <td>{{ $p->price_medium }}</td>
                                            <td>{{ $p->price_large }}</td>

                                            <td>
                                                <select name="size" class="form-control" style="width: 90px;">
                                                    <option selected value="small">Mała</option>
                                                    <option value="medium">Średnia</option>
                                                    <option value="large">Duża</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" value="1" name="quantity" class="form-control"
                                                       style="width: 50px; text-align: center"/>
                                                <input type="hidden" value="{{ $p->id }}" name="p_id"/>
                                            </td>
                                            <td>
                                                <input type="submit" value="Dodaj"/>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </section>
        </article>
@endsection