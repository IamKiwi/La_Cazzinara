@extends('main')
@section('title', 'Historia zamówień')
@section('content')
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                @include('partials._messages')

                <div class="table-wrapper">
                        <h4>Historia zamówień</h4>
                        <p>Zobacz historię swoich zamówień. Możesz podzielić się z nami swoją opinią, jeśli
                        masz ochotę.</p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Czas zamówienia</th>
                                <th>Kwota</th>
                                <th>Status</th>
                                <th>Szczegóły zamówienia</th>
                                <th>Wystaw opinie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $o)
                                <tr>
                                    <td>{{ $o->created_at }}</td>
                                    <td>{{ $o->total_price }}</td>

                                    @if($o->status !== 'Zrealizowane' and $o->status !== 'Odrzucone' and $o->status !== 'Odmówione')
                                        <td><a href="{{ route('client.ordered') }}" class="btn-link">{{ $o->status }}</a></td>
                                    @else
                                        <td>{{ $o->status }}</td>
                                    @endif
                                    <td><a href="{{ route('client.ordershistorydetails', $o->id) }}" class="btn btn-info btn-sm">Zobacz</a></td>
                                    @if($o->status === 'Zrealizowane' and empty($o->feedback[0]))
                                        <td><a href="{{ route('client.sendfeedback', $o->id) }}" class="btn btn-info btn-sm">Wystaw opinie</a></td>
                                    @elseif($o->status === 'Zrealizowane' and !empty($o->feedback[0]))
                                        <td><a href="{{ route('client.seefeedback', $o->id) }}" class="btn btn-info btn-sm">Zobacz</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                <div class="12u$">
                    <div class="text-center">
                        {!! $order->links() !!}
                    </div>
                    <div class="text-center">
                        <hr>
                        <a href="{{ route('client.dashboard') }}" class="button special red">Powrót</a>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>
@endsection