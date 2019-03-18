@extends('main')

@section('title', 'Zamówienie')

@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5 fancy-back">
                <div class="inner white-back">
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
                                        <td>{{ $o->size}}</td>
                                        <td>{{ number_format($o->price , 2, '.', ' ')}}</td>
                                        <td>{{ $o->quantity}}</td>
                                    </tr>
                                @endforeach
                                Całkowita kwota zamówienia: <h3>{{ $order->total_price}}</h3>
                                Status zamówienia:
                                <h3 id="orderStatus">
                                    {{ $order->status == 'Gotowe' ? $order->status.'. Kierowca już jedzie :)' : $order->status }}
                                </h3>
                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                        <div class="text-center">
                            <hr>
                            <a href="{{ route('client.dashboard') }}" class="button special red">Powrót</a>
                        </div>
                    </section>
                </div>
            </section>
        </article>
    </div>
@endsection
@section('scripts')
    <script>
        function checkStatus() {
            $.ajax({
                url: "{{ route('client.trackstatus') }}",
                success: function(data) {
                    $('#orderStatus').html('');
                    $('#orderStatus').html(data.status);
                }
            });
        }

        window.setInterval(function(){
            checkStatus();
        }, 5000);
    </script>
@endsection