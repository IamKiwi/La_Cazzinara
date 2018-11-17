@extends('main')

@section('title', 'Zarządzanie użytkownikami')
@section('content')
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <header>
                        <h4>Panel Administratora</h4>
                        <h5>Użytkownicy</h5>
                        <p>Zarządzanie użytkownikami</p>
                        <hr>
                    </header>
                </section>
                <section>
                    <div class="inner">
                        <form id="searchForm">
                            <div class="row uniform">
                                <div class="4u 12u$(xsmall)">
                                    <input type="text" name="pizzaSearch" placeholder="Nazwa użytkownika" value="" />
                                </div>
                                <div class="8u 12u$(xsmall)">
                                    <button type="submit">Szukaj</button>
                                </div>
                            </div>
                        </form>
                    <div class="table-wrapper">
                        <h4>Nasze pizze</h4>
                        <table class="table lower-font">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nazwa użytkownika (mail)</th>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Adres</th>
                                <th>Nr telefonu</th>
                                <th>Rola w systemie</th>
                                <th>Ostatnio modyfikowano</th>
                                <th>Modyfikował</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->surname}}</td>
                                {{--<td>{{ $p->Adres }}</td>--}}
                                <td>{{ $p->phone_number }}</td>
                                {{--<td>{{ $p->Rola }}</td>--}}
                                {{--<td>{{ $p->Last_mod }}</td>--}}
                                {{--<td>{{ $p->ID_Edytora }}</td>--}}
                                <td><a href="{{ route('admin.useredit', $p->id) }}" class="btn btn-info btn-sm">Edytuj</a></td>
                                <td><a href="#" class="btn btn-danger btn-sm">Usuń</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </section>
                <section>
                    <div class="row uniform">
                        <ul class="actions">
                            <br>
                            <li><a href="/admin" class="button special">Powrót</a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
    </article>
@endsection