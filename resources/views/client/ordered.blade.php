@extends('main')

@section('title', 'Zamówienie')

@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5">
                <div class="inner">
                    @include('partials._messages')

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
                                @foreach($orderitem as $o)
                                    <tr>
                                        <td>{{ $o->pizza[0]->name}}</td>
                                        <td>{{ $o->pizza[0]->ingredients}}</td>
                                        <td>{{ $o->price}}</td>
                                        <td>{{ $o->size}}</td>
                                        <td>{{ $o->quantity}}</td>
                                    </tr>
                                @endforeach
                                Całkowita kwota zamówienia: <h3>{{ $order->total_price}}</h3>
                                Status zamówienia:
                                <h3>
                                    {{ $order->status == 'Gotowe' ? $order->status.'. Kierowca już jedzie :)' : $order->status }}
                                </h3>
                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                    </section>
                </div>
            </section>
        </article>
@endsection