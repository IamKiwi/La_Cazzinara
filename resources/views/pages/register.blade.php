@extends('main')
@section('title', 'Rejestracja')
@section('content')
    <article id="main">
        <section class="wrapper style5 wooden-back">
            <div class="inner">
                <section>
                    <header>
                        <h4>Zarejestruj się</h4>
                        <p>Aby skorzystać w pełni z oferowanych usług załóż u nas darmowe konto</p>
                        <hr>
                    </header>
                </section>
                <section>
                    <form method="post" action="#">
                        <h4>Dane osobowe</h4>
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="imie" id="imie" value="" placeholder="Imię" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="nazwisko" id="nazwisko" value="" placeholder="Nazwisko" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="mail" id="mail" value="" placeholder="Mail" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="nr_tel" id="nr_tel" value="" placeholder="Nr telefonu" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="password" name="haslo" id="haslo" value="" placeholder="Hasło" />
                            </div>

                            <div class="6u 12u$(xsmall)">
                                <input type="password" name="haslo_confirm" id="haslo_confirm" value="" placeholder="Powtórz Hasło" />
                            </div>

                            <div class="12u$">
                                <br><h4>Adres</h4>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="ulica" id="ulica" value="" placeholder="Ulica" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="nr_lok" id="nr_lok" value="" placeholder="Nr domu / mieszkania" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="miasto" id="miasto" value="" placeholder="Miasto" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="zipcode" id="zipcode" value="" placeholder="Kod pocztowy" />
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