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
                            <form method="post" action="{{ route('admin.generatespdf') }}">
                                @csrf
                                <input type="hidden" name="chartImg" id="chartImg">
                                <input type="hidden" name="chartImg2" id="chartImg2">
                                <input type="hidden" name="chartImg3" id="chartImg3">
                                <input type="hidden" name="chartImg4" id="chartImg4">
                                <input type="hidden" name="chartImg5" id="chartImg5">
                                <button type="submit" class="btn btn-block white dark">Generuj Raport</button>
                            </form>
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
                    <div id="perf_div5">
                        @piechart('Opinions', 'perf_div5')
                    </div>
                    <div class="text-center">
                        <hr>
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
@section('scripts')
    <script>
        function getImageCallBack(event, chart) {
            $('#chartImg').val(chart.getImageURI());
        }
        function getImageCallBack2(event, chart) {
            $('#chartImg2').val(chart.getImageURI());
        }
        function getImageCallBack3(event, chart) {
            $('#chartImg3').val(chart.getImageURI());
        }
        function getImageCallBack4(event, chart) {
            $('#chartImg4').val(chart.getImageURI());
        }
        function getImageCallBack5(event, chart) {
            $('#chartImg5').val(chart.getImageURI());
        }
    </script>
@endsection