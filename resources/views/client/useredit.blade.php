@extends('main')
@section('title', 'Edycja profilu')
@section('content')
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <section>
                    <header>
                        <h4>Edytuj swój profil</h4>
                        <p>Wprowadź zmiany do swoich danych</p>
                        <hr>
                    </header>
                </section>
                <section>
                    @include('partials._messages')

                    <div class="12u$">
                        <h4>Zmiana hasła</h4>
                        <p>Możesz zmienić swoje hasło klikając poniższy przycisk</p>
                        <a href="{{ route('client.passchange') }}" class="button ">Zmień hasło</a>
                    </div>

                    <div class="12u$">
                        <hr>
                    </div>

                    <form method="post" action="{{ route('client.update', Auth::id()) }}">
                        @csrf
                        <h4>Dane osobowe</h4>
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="Imię" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="surname" value="{{ $user->surname }}" placeholder="Nazwisko" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <select name="sex">
                                    <option>-- Płeć --</option>
                                    <option value="m" @if($user->sex == 'm') selected @endif>Mężczyzna</option>
                                    <option value="k" @if($user->sex == 'k') selected @endif>Kobieta</option>
                                </select>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="date_of_birth" value="{{ $user->date_of_birth }}" placeholder="Data urodzenia (RRRR/MM/DD)" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Mail" class="force-white" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}" placeholder="Nr telefonu" />
                            </div>

                            <div class="12u$">
                                <br><h4>Adres</h4>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="street" value="{{ $user_addr['street'] }}" placeholder="Ulica" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="number" value="{{ $user_addr['number'] }}" placeholder="Nr domu / mieszkania" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="city" value="{{ $user_addr['city'] }}" placeholder="Miasto" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="zipcode" value="{{ $user_addr['zipcode'] }}" placeholder="Kod pocztowy" />
                            </div>

                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Aktualizuj" class="button special green dark" /></li>
                                    <li><input type="reset" value="Wyczyść" class="force-white"/></li>
                                    <li><a href="{{ route('client.dashboard') }}" class="button special red fix-margin-top">Anuluj</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection