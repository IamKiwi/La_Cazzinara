@extends('main')

@section('title', 'Bieżące zamówienia')
@section('content')
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <section>
                    <header>
                        <h4>Panel Administratora</h4>
                        <h5>Zarządzanie zamówieniami</h5>
                        <hr>
                    </header>
                </section>
                <h4>Wyszukiwanie</h4>
                @include('partials._messages')
                <form id="searchForm" action="{{ route('admin.searchorders') }}">
                    <div class="row uniform">
                        <div class="2u 12u$(xsmall)">
                            <input type="text" name="id" placeholder="Nr" value="" />
                        </div>
                        <div class="2u 12u$(xsmall)">
                            <input type="text" name="status" placeholder="Status" value="" />
                        </div>
                        <div class="2u 12u$(xsmall)">
                            <input type="text" name="address" placeholder="Adres" value="" />
                        </div>
                        <div class="2u 12u$(xsmall)">
                            <input type="text" name="phone" placeholder="Telefon" value="" />
                        </div>
                        <div class="2u 12u$(xsmall)">
                            <button type="submit">Szukaj</button>
                        </div>
                    </div>
                </form>
                <div class="table-wrapper">
                        <h4>Bieżące zamówienia</h4>
                        <p> Rekordy {{$order->firstItem()}} - {{$order->lastItem()}} z {{$order->total()}}</p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Zmień status</th>
                                <th>Nr zam..</th>
                                <th>Czas zamówienia</th>
                                <th>Kwota</th>
                                <th>Adres dostawy</th>
                                <th>Nr telefonu klienta</th>
                                <th>Status</th>
                                <th>Szczegóły zamówienia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $o)
                                <tr>
                                    <td>
                                        @if($o->status != 'Odrzucone' && $o->status != 'Zrealizowane' && $o->status != 'Odmówione')
                                        <div class="dropdown">
                                            <a class="dropdown-toggle glyphicon glyphicon-cog inverted" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                @if($o->status === 'Oczekiwanie na potwierdzenie')
                                                    <li>
                                                        <a href="{{ route('admin.acceptorder', $o->id) }}"
                                                           class="borderless no-padding menu-blue">Przyjmij</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('admin.rejectorder', $o->id) }}"
                                                           class="borderless no-padding menu-red">Odrzuć</a>
                                                    </li>
                                                @elseif($o->status === 'W trakcie realizacji')
                                                    <li><a href="{{ route('admin.preparedorder', $o->id) }}"
                                                           class="borderless no-padding menu-blue">Gotowe</a></li>
                                                    <li>
                                                        <a href="{{ route('admin.refusedorder', $o->id) }}"
                                                           class="borderless no-padding menu-red">Odmowa</a>
                                                    </li>
                                                @elseif($o->status === 'Gotowe')
                                                    <li>
                                                        <a href="{{ route('admin.orderisready', $o->id) }}"
                                                           class="borderless no-padding menu-blue">Zrealizowane</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('admin.refusedorder', $o->id) }}"
                                                           class="borderless no-padding menu-red">Odmowa</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
                                    <td>{{ $o->id }}</td>
                                    <td>{{ $o->created_at }}</td>
                                    <td>{{ $o->total_price }}</td>
                                    <td>{{ $o->user->address}}</td>
                                    <td>{{ $o->user->phone_number}}</td>
                                    <td>{{ $o->status}}</td>
                                    <td><a href="{{ route('admin.orderstrackdetails', $o->id) }}" class="btn btn-info btn-sm">Zobacz</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                <div class="text-center">
                    {!! $order->links() !!}
                    <hr>
                    <ul class="actions text-center">
                        <li><a href="{{ route('admin.dashboard') }}" class="button special">Powrót</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </article>
</div>
@endsection