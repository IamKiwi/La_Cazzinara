@extends('main')
@section('title', 'Statystyki')
@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5 fancy-back">
                <div class="inner white-back">
                    <section>
                        <header>
                            <h4>Panel Administratora</h4>
                            <p>Statystyki funkcjonowania przedsiębiorstwa</p>
                            <hr>
                        </header>
                    </section>
                    @include('partials._messages')
                    <div id="perf_div">
                        @barchart('Pizzas', 'perf_div')
                    </div>
                    <div id="perf_div2">
                        @barchart('OStats', 'perf_div2')
                    </div>
                    <div id="perf_div3">
                        @barchart('Users', 'perf_div3')
                    </div>
                    <div id="perf_div4">
                        @barchart('Feed', 'perf_div4')
                    </div>
                    <div class="text-center">
                        <div class="12u$">
                            <ul class="actions">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="button special red fix-margin-top">Powrót</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
@endsection