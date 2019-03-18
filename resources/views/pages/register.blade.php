@extends('main')
@section('title', 'Rejestracja')
@section('content')
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <section>
                    <header>
                        <h4>Zarejestruj się</h4>
                        <p>Aby skorzystać w pełni z oferowanych usług załóż u nas darmowe konto</p>
                        <hr>
                    </header>
                </section>
                <section>
                    @include('partials._messages')

                    <form method="post" action="{{ route('register') }}" data-parsley-validate="" id="reg">
                        @csrf
                        <h4>Dane osobowe</h4>
                        <div class="row uniform text-center">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Imię" required=""
                                       data-parsley-required-message="Musisz podać imię"/>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Nazwisko" required=""
                                       data-parsley-required-message="Musisz podać nazwisko"/>
                            </div>
                        </div>
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <select name="sex">
                                    <option value="">-- Płeć --</option>
                                    <option value="m">Mężczyzna</option>
                                    <option value="k">Kobieta</option>
                                </select>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                       placeholder="Data urodzenia (RRRR-MM-DD)"/>
                            </div>
                        </div>
                        <div class="row uniform text-center">
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Mail" class="force-white"
                                       data-parsley-required-message="Musisz podać adres email" required=""
                                       data-parsley-type-message="Niepoprawny format adresu email"/>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Nr telefonu" required=""
                                       data-parsley-required-message="Musisz podać numer telefonu" minlength="9"
                                       data-parsley-minlength-message="Numer telefonu musi składać się z 9 cyfr"/>
                            </div>
                        </div>
                        <div class="row uniform text-center">
                            <div class="6u 12u$(xsmall)">
                                <input type="password" id="password" name="password" value="" placeholder="Hasło"
                                       required="" class="force-white"
                                       data-parsley-required-message="Musisz podać hasło"/>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="password" name="password_confirmation" value="" placeholder="Powtórz Hasło"
                                       data-parsley-required-message="Musisz potwierdzić hasło" required=""
                                       data-parsley-equalto="#password" class="force-white"
                                       data-parsley-equalto-message="Hasła muszą być zgodne"/>
                            </div>
                        </div>
                        <div class="12u$">
                            <br><h4>Adres</h4>
                        </div>
                        <div class="row uniform text-center">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="street" value="{{ old('street') }}" placeholder="Ulica" required=""
                                       data-parsley-required-message="Musisz podać ulice"
                                       pattern="/[a-zA-Z]+/"
                                       data-parsley-pattern-message="Niepoprawna nazwa ulicy"/>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="number" value="{{ old('number') }}" placeholder="Nr domu / mieszkania" required=""
                                       data-parsley-required-message="Musisz podać nr lokalu"
                                       pattern="/\d*\w?\/?\d+\w?/"
                                       data-parsley-pattern-message="Niepoprawny nr lokalu"/>
                            </div>
                        </div>
                        <div class="row uniform text-center">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Miasto" required=""
                                       data-parsley-required-message="Musisz podać miasto"
                                       pattern="/[a-zA-Z]+/"
                                       data-parsley-pattern-message="Niepoprawna nazwa miasta"/>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="zipcode" value="{{ old('zipcode') }}" placeholder="Kod pocztowy (99-999)" required=""
                                       data-parsley-required-message="Musisz podać kod pocztowy" pattern="/[0-9]{2}-[0-9]{3}/"
                                       data-parsley-pattern-message="Niepoprawny kod pocztowy"/>
                            </div>
                        </div>
                        <div class="row uniform">
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Zarejestruj się" class="button special green dark"/></li>
                                    <li><input type="reset" value="Wyczyść" class="force-white"/></li>
                                    <li><a href="/" class="button special red fix-margin-top">Powrót</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection