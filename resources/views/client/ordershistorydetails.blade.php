@extends('main')

@section('title', 'Szczegóły zamówienia')
@section('content')
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                    <div class="table-wrapper">
                        <h4>Szczegółowe informacje o zamówieniu</h4>
                        <p>Przejrzyj szczegóły swojego zamówienia.</p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Nr Zam...</th>
                                <th>Nazwa pizzy</th>
                                <th>Składniki</th>
                                <th>Cena</th>
                                <th>Rozmiar</th>
                                <th>Ilość</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orderdetails as $o)
                                    <tr>
                                        <td>{{ $o->id_order }}</td>
                                        <td>{{ $o->pizza[0]->name}}</td>
                                        <td>{{ $o->pizza[0]->ingredients}}</td>
                                        @if($o->size == 'Mała') <td>{{ $o->pizza[0]->price_small }}</td> @endif
                                        @if($o->size == 'Średnia') <td>{{ $o->pizza[0]->price_medium }}</td> @endif
                                        @if($o->size == 'Duża') <td>{{ $o->pizza[0]->price_large }}</td> @endif
                                        <td>{{ $o->size }}</td>
                                        <td>{{ $o->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                <div class="12u$">
                    <ul class="actions">
                        <br>
                        <li><a href="{{ redirect()->back()->getTargetUrl() }}" class="button special red fix-margin-top">Powrót</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </article>
</div>
@endsection