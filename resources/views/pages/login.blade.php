@extends('main')
@section('title', 'Logowanie')
@section('content')
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5 wooden-back">
            <div class="inner">
                <section>
                    <header>
                        <h4>Zaloguj się</h4>
                        <p>Zaloguj się na swoje konto</p>
                        <p>Nie masz jeszcze konta? <a href="/register">Zarejestruj się</a></p>
                        <hr>
                    </header>
                </section>
                <section>
                    <form method="post" action="#">
                        <h4>Logowanie</h4>
                        <div class="row uniform">
                            <div class="12u$">
                                <input type="email" name="mail_login" id="mail_login" value="" placeholder="E-Mail"/>
                            </div>
                            <div class="12u$">
                                <input type="password" name="pass_login" id="pass_login" value="" placeholder="Hasło"/>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Zaloguj się" class="button special green"/></li>
                                    <li><input type="reset" value="Wyczyść"/></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection