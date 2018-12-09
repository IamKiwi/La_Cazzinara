@extends('main')

@section('title', 'Szczegóły zamówienia')
@section('content')
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                    <div class="table-wrapper">
                        <h4>Szczegółowe informacje o zamówieniu</h4>
                        <p>Przejrzyj szczegóły zamówienia. Zrealizuj je lub odrzuć.
                        Pamiętaj, aby zmienić status w widoku obsługi zamówień.</p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Nr Zam...</th>
                                <th>Nazwa pizzy</th>
                                <th>Składniki</th>
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