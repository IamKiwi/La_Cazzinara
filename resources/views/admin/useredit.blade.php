@extends('main')
@section('title', 'Edycja użytkownika')

@section('content')
<div id="page-wrapper">
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <form method="post" action="#">
                        <h4>Dane osobowe</h4>
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="imie" id="imie" value="{{ $user->Imie }}" placeholder="Imię" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="nazwisko" id="nazwisko" value="{{ $user->Nazwisko }}" placeholder="Nazwisko" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="email" name="mail" id="mail" value="{{ $user->Mail }}" placeholder="Mail" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="nr_tel" id="nr_tel" value="{{ $user->Nr_tel }}" placeholder="Nr telefonu" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <select name="plec">
                                    <option>-- Płeć --</option>
                                    <option value="m">Mężczyzna</option>
                                    <option value="k">Kobieta</option>
                                </select>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="data_ur" id="data_ur" value="" placeholder="Data urodzenia (DD/MM/RRRR)" />
                            </div>
                            {{--<div class="6u 12u$(xsmall)">--}}
                                {{--<select required name="rola">--}}
                                    {{--<option value="Admin" {if $person->rola == 'Admin'}selected{/if}>Admin</option>--}}
                                    {{--<option value="User" {if $person->rola == 'User'}selected{/if}>User</option>--}}
                                    {{--<option value="Pracownik" {if $person->rola == 'Pracownik'}selected{/if}>Pracownik</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            <div class="12u$">
                                <br><h4>Adres</h4>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="ulica" id="ulica" value="{{ $adres['ulica'] }}" placeholder="Ulica" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="nr_lok" id="nr_lok" value="{{ $adres['nr_lok'] }}" placeholder="Nr domu / mieszkania" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="miasto" id="miasto" value="{{ $adres['miasto'] }}" placeholder="Miasto" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="woj" id="woj" value="{{ $adres['kp'] }}" placeholder="Kod pocztowy" />
                                <input type="hidden" name="id" value="{{ $user->ID_User }}">
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Zapisz" class="button special green" /></li>
                                    <li><input type="reset" value="Wyczyść" /></li>
                                    <li><a href="{{ route('admin.userlist') }}" class="button special red">Powrót</a></li>
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