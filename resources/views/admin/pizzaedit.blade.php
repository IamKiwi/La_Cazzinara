@extends('main')
@section('title', 'Edycja pizzy')

@section('content')
<!-- Page Wrapper -->
<div id="page-wrapper">
    <!-- Main -->
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <section>
                    @include('partials._messages')
                    <form method="post" action="{{ empty($pizza->id) ? route('admin.savepizza') : route('admin.updatepizza', $pizza->id)}}">
                        @csrf
                        <h4>Dodaj / edytuj pizze</h4>
                        <div class="row uniform">
                            <div class="12u">
                                <input type="text" name="name"
                                       value="{{ empty($pizza->name) ? "" : $pizza->name }}" placeholder="Nazwa" />
                            </div>
                            <div class="4u 12u$(xsmall)">
                                <input type="text" name="price_small"
                                       value="{{ empty($pizza->price_small) ? "" : $pizza->price_small }}" placeholder="Cena mała" />
                            </div>
                            <div class="4u 12u$(xsmall)">
                                <input type="text" name="price_medium"
                                       value="{{ empty($pizza->price_medium) ? "" : $pizza->price_medium }}" placeholder="Cena średnia" />
                            </div>
                            <div class="4u 12u$(xsmall)">
                                <input type="text" name="price_large"
                                       value="{{ empty($pizza->price_large) ? "" : $pizza->price_large }}" placeholder="Cena duża" />
                            </div>
                            <div class="12u">
                                <input type="text" name="ingredients"
                                       value="{{ empty($pizza->ingredients) ? "" : $pizza->ingredients}}" placeholder="Skladniki" />
                                <input type="hidden" name="id" value="{{ empty($pizza->id) ? "" : $pizza->id}}">
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <br>
                                    <li><input type="submit" value="Zapisz" class="button special green force-black" /></li>
                                    <li><input type="reset" value="Wyczyść" class="button"/></li>
                                    <li><a href="{{route('admin.pizzalist')}}" class="button special fix-margin-top">Powrót</a></li>
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