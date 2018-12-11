@extends('main')
@section('title', 'Opinie użytkowników')
@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5">
                <div class="inner">
                    @include('partials._messages')

                    <div class="table-wrapper">
                        <h4>Opinie wystawione przez użytkowników</h4>
                        <p></p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Data zamówienia</th>
                                <th>Data wystawienia opinii</th>
                                <th>Nr zam..</th>
                                <th>Rodzaj opinii</th>
                                <th>Widoczność</th>
                                <th>Opinia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $f)
                                <tr>
                                    <td>{{ $f->order->created_at }}</td>
                                    <td>{{ $f->created_at }}</td>
                                    <td>{{ $f->order->id }}</td>
                                    @if($f->grade === 'positive')
                                        <td class="menu-green">Pozytywna</td>
                                    @elseif($f->grade === 'neutral')
                                        <td class="menu-blue">Neutralna</td>
                                    @else
                                        <td class="menu-red">Negatywna</td>
                                    @endif
                                    @if($f->public === 'true')
                                        <td class="menu-green">Publiczna</td>
                                    @else
                                        <td class="menu-blue">Prywatna</td>
                                    @endif
                                    <td><a href="#" class="btn btn-info btn-sm" id="see">Zobacz</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="button special red fix-margin-top">Powrót</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </article>
    </div>
@endsection