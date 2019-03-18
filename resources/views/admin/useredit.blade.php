@extends('main')
@section('title', 'Edycja użytkownika')

@section('content')
<div id="page-wrapper">
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <section>
                    <section>
                        <header>
                            <h4>Edycja użytkownika</h4>
                            <hr>
                        </header>
                    </section>
                    @include('partials._messages')
                    <form method="post" action="{{ route('admin.updateuser', $user->id)}}">
                        @csrf
                        <h4>Dane osobowe</h4>
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="name" value="{{ $user->name}}" placeholder="Imię" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="surname" value="{{ $user->surname }}" placeholder="Nazwisko" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Mail" class="force-white"/>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}" placeholder="Nr telefonu" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <select name="sex">
                                    <option>-- Płeć --</option>
                                    <option value="m" @if($user->sex == 'm') selected @endif>Mężczyzna</option>
                                    <option value="k" @if($user->sex == 'k') selected @endif>Kobieta</option>
                                </select>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="date_of_birth" value="{{ $user->date_of_birth }}" placeholder="Data urodzenia (DD/MM/RRRR)" />
                            </div>

                            <div class="12u$">
                                <br><h4>Adres</h4>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="street" value="{{ $address['street'] }}" placeholder="Ulica" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="number" value="{{ $address['number'] }}" placeholder="Nr domu / mieszkania" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="city" value="{{ $address['city'] }}" placeholder="Miasto" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="zipcode" value="{{ $address['zipcode'] }}" placeholder="Kod pocztowy" />
                                <input type="hidden" name="id" value="{{ $user->id }}">
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Zapisz" class="button special green force-black" /></li>
                                    <li><input type="reset" value="Wyczyść" class="force-white"/></li>
                                    <li><a href="{{ route('admin.userlist') }}" class="button special red fix-margin-top">Anuluj</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
</div>
@endsection