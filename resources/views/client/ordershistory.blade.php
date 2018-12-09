@extends('main')

@section('title', 'Historia zamówień')
@section('content')
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                    <div class="table-wrapper">
                        <h4>Historia zamówień</h4>
                        <p>Zobacz historię swoich zamówień. Możesz podzielić się z nami swoją opinią, jeśli
                        masz ochotę.</p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Nr zam..</th>
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
                                    <td>{{ $o->id }}</td>
                                    <td>{{ $o->created_at }}</td>
                                    <td>{{ $o->total_price }}</td>
                                    <td>{{ $o->status}}</td>
                                    <td><a href="{{ route('client.ordershistorydetails', $o->id) }}" class="btn btn-info btn-sm">Zobacz</a></td>
                                    <td><a href="#" class="btn btn-info btn-sm">Wystaw opinie</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                <div class="12u$">
                    <ul class="actions">
                        <br>
                        <li><a href="{{ route('client.dashboard') }}" class="button special red fix-margin-top">Powrót</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </article>
</div>
@endsection