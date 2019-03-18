@extends('main')
@section('title', 'Logowanie Administratora')
@section('content')
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5 fancy-back ">
            <div class="inner white-back">
                <section>
                    <header>
                        <h4>Logowanie Administratora</h4>
                        <hr>
                    </header>
                </section>
                <section>

                    <ul class="errors">
                        @foreach ($errors->all() as $message)
                            <li style="list-style: none"><div class="alert alert-danger" role="alert">{{ $message }}</div></li>
                        @endforeach
                    </ul>

                    <form method="post" action="{{route('admin.login')}}">
                        @csrf

                        <h4>Logowanie</h4>
                        <div class="row uniform">
                            <div class="12u$">
                                <input type="email" name="email" id="email" value="" placeholder="E-Mail" class="force-white"/>
                            </div>
                            <div class="12u$">
                                <input type="password" name="password" id="password" value="" placeholder="Hasło" class="force-white"/>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Zaloguj się" class="button special green force-black"/></li>
                                    <li><input type="reset" class="force-white" value="Wyczyść"/></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection