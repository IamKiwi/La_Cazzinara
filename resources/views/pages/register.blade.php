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

                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <h4>Dane osobowe</h4>
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="name" value="" placeholder="Imię" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="surname" value="" placeholder="Nazwisko" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <select name="sex">
                                    <option>-- Płeć --</option>
                                    <option value="m">Mężczyzna</option>
                                    <option value="k">Kobieta</option>
                                </select>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="date_of_birth" value="" placeholder="Data urodzenia (RRRR/MM/DD)" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="email" value="" placeholder="Mail" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="phone_number" value="" placeholder="Nr telefonu" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="password" name="password" value="" placeholder="Hasło" />
                            </div>

                            <div class="6u 12u$(xsmall)">
                                <input type="password" name="password_confirmation" value="" placeholder="Powtórz Hasło" />
                            </div>

                            <div class="12u$">
                                <br><h4>Adres</h4>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="street" value="" placeholder="Ulica" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="number" value="" placeholder="Nr domu / mieszkania" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="city" value="" placeholder="Miasto" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="zipcode" value="" placeholder="Kod pocztowy" />
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Zarejestruj się" class="button special green" /></li>
                                    <li><input type="reset" value="Wyczyść" /></li>
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