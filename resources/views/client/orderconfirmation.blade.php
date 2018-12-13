@extends('main')

@section('title', 'Potwierdź zamówienie')

@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5 fancy-back">
                <div class="inner white-back">
                    <section>
                        <header>
                            <h4>Potwierdzenie zamówienia</h4>
                            <p>Przejrzyj swoje zamówienie. Jeśli wszystko się zgadza, kliknij "Zamawiam"</p>
                            <hr>
                        </header>
                    </section>
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
                                @foreach($cart as $c)
                                    <tr>
                                        <td>{{ $c->name}}</td>
                                        <td>{{ $c->attributes->ingredients}}</td>
                                        <td>{{ $c->attributes->size }}</td>
                                        <td>{{ number_format($c->price , 2, '.', ' ')}}</td>
                                        <td>{{ $c->quantity }}</td>
                                    </tr>
                                @endforeach
                                Całkowita kwota zamówienia: <h3>{{ number_format(Cart::getTotal() , 2, '.', ' ')}}</h3>
                                </tbody>
                            </table>
                            <br>
                            <a href="{{ route('client.confirmorder') }}" class="button special green">Zamawiam</a>
                            <a href="{{ route('client.cancelcart') }}" class="button special red">Rozmyśliłem się</a>
                            <br>
                        </div>
                    </section>
                </div>
            </section>
        </article>
@endsection