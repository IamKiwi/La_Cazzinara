@extends('main')
@section('title', 'Edycja pizzy')

@section('content')
<!-- Page Wrapper -->
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <form method="post" action="#">
                        <h4>Dodaj / edytuj pizze</h4>
                        <div class="row uniform">
                            <div class="12u">
                                <input type="text" name="nazwa" id="nazwa" value="{{ $pizza->Nazwa }}" placeholder="Nazwa" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="cena_m" id="cena_m" value="{{ $pizza->Cena_mala }}" placeholder="Cena mała" />
                            </div>
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="cena_d" id="cena_d" value="{{ $pizza->Cena_duza }}" placeholder="Cena duża" />
                            </div>
                            <div class="12u">
                                <input type="text" name="skladniki" id="skladniki" value="{{ $pizza->Skladniki }}" placeholder="Skladniki" />
                                <input type="hidden" name="id" value="{{ $pizza->ID_Pizza }}">
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Zapisz" class="button special green" /></li>
                                    <li><input type="reset" value="Wyczyść" class="button"/></li>
                                    <li><a href="/admin" class="button special fix-margin-top">Powrót</a></li>
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