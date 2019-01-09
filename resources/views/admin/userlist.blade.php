@extends('main')

@section('title', 'Zarządzanie użytkownikami')
@section('content')
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
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
                        @include('partials._messages')
                        <h4>Wyszukiwanie</h4>
                        <form id="searchForm" action="{{ route('admin.searchusers') }}">
                            <div class="row uniform">
                                <div class="3u 12u$(xsmall)">
                                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" />
                                </div>
                                <div class="3u 12u$(xsmall)">
                                    <input type="text" name="name" placeholder="Imię" value="{{ old('name') }}" />
                                </div>
                                <div class="3u 12u$(xsmall)">
                                    <input type="text" name="surname" placeholder="Nazwisko" value="{{ old('surname') }}" />
                                </div>
                                <div class="3u 12u$(xsmall)">
                                    <input type="text" name="address" placeholder="Adres" value="{{ old('address') }}" />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="2u 12u$(xsmall)">
                                    <input type="text" name="phone" placeholder="Telefon" value="{{ old('phone') }}" />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <select name="visible_users">
                                        <option value="" >Wszyscy</option>
                                        <option value="active" @if(old('visible_users') === 'active') selected @endif>Tylko aktywni</option>
                                        <option value="trashed" @if(old('visible_users') === 'trashed') selected @endif>Tylko deaktywowane konta</option>
                                    </select>
                                </div>

                                <div class="2u 12u$(xsmall)">
                                    <button type="submit">Szukaj</button>
                                </div>
                            </div>
                        </form>
                    <div class="table-responsive">
                        <h4>Użytkownicy</h4>
                        <table class="table lower-font">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Adres</th>
                                <th>Nr telefonu</th>
                                <th>Data urodzenia</th>
                                <th>Data rejestracji</th>
                                <th>Data ostatniej aktualizacji</th>
                                <th>Data deaktywacji</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $p)
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle glyphicon glyphicon-cog inverted" type="button"
                                           id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            @if(empty($p->deleted_at))
                                            <li><a href="{{ route('admin.useredit', $p->id) }}"
                                                   class="borderless no-padding menu-blue">Edytuj</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{ route('admin.userdelete', $p->id) }}"
                                                   class="borderless no-padding menu-red">Deaktywuj konto</a></li>
                                            @else
                                                <li><a href="{{ route('admin.userrestore', $p->id) }}"
                                                       class="borderless no-padding menu-red">Przywróć</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->surname}}</td>
                                <td>{{ $p->address}}</td>
                                <td>{{ $p->phone_number }}</td>
                                <td>{{ !empty($p->date_of_birth) ? date('y-m-d', strtotime($p->date_of_birth)) : ""}}</td>
                                <td>{{ !empty($p->created_at) ? date('y-m-d H:i:s', strtotime($p->created_at)) : ""}}</td>
                                <td>{{ !empty($p->updated_at) ? date('y-m-d H:i:s', strtotime($p->updated_at)) : ""}}</td>
                                <td>{{ !empty($p->deleted_at) ? date('y-m-d H:i:s', strtotime($p->deleted_at)) : ""}}</td>
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