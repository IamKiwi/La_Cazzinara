@extends('main')

@section('title', 'Nasze menu')
@section('content')
    <article id="main">
        <section class="wrapper style5 fancy-back">
            <div class="inner white-back">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Menu</h2>
                        <p class="lead">Przeglądaj menu lub wyszukaj pizze po jej nazwie i wybierz coś dla siebie.</p>
                        <form id="searchForm" action="{{ route('pages.searchpizzalist') }}">
                            <div class="row uniform">
                                <div class="3u 12u$(xsmall)">
                                    <input type="text" id="search" name="search" placeholder="Nazwa pizzy" />
                                </div>
                                <div class="3u 12u$(xsmall)">
                                    <button type="submit">Szukaj</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-wrapper">
                            <table id="pizzatable">
                                <thead>
                                <tr>
                                    <th>Nazwa Pizzy</th>
                                    <th>Składniki</th>
                                    <th>Mała (35cm)</th>
                                    <th>Średnia (45cm)</th>
                                    <th>Duża (60cm)</th>
                                </tr>
                                </thead>
                                <tbody id="pizzas">
                                @foreach($pizza as $p)
                                    <tr>
                                        <td width="15%">{{$p->name}}</td>
                                        <td>{{$p->ingredients}}</td>
                                        <td>{{$p->price_small}}</td>
                                        <td>{{$p->price_medium}}</td>
                                        <td>{{$p->price_large}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center hideIfN">
                            {!! $pizza->links() !!}
                        </div>
                        <div class="text-center">
                            <a href="/" class="button special red">Powrót</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection

@if(Request::is('pizzalist') || Request::is('pizzalist/s'))
@section('scripts')
    <script>
        // When view is loaded
        $(document).ready(function () {
            $('.pagination>li:first-child>span').remove();
            $('.pagination>li:last-child>a').remove();

            $.ajax({
                url: "{{ route('api.pizzalist') }}",
                success: function(html) {
                    $('#pizzas tr').remove();
                    $('#pizzas').html(html);
                }});
        });

        // When pagination button is clicked
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            if (page != 1) {   //Fix for page 1 because it doesn't get a link with ajax
                $('.pagination li:nth-child(2) > span').replaceWith('<a href="?page=1">1</a>');
                $('.pagination li').removeClass("active");
                $('.pagination li').removeClass("disabled");
                // $('.pagination li:nth-child(' + activePage + ')').addClass('active');
            }
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            getData(page);

        });

        // When user uses search
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            if(query != '') {
                $('.hideIfN').hide();
                getSearch(query);
            } else {
                $('.hideIfN').show();
                getData(1);
            }
        });

        function getData(page) {
            $.ajax({
                url: "{{ route('api.pizzalist') }}?page="+page,
                success: function(html){
                    $('#pizzas tr').remove();
                    $('#pizzas').html(html);
                }
            });
        }

        function getSearch(query = '') {
            $.ajax({
                url: "{{ route('api.searchpizzalist') }}",
                data:{query:query},
                dataType:'json',
                success: function(html){
                    $('#pizzas tr').remove();
                    if (query != '')
                        ;
                    else
                        $('.hideIfN').show();
                    $('#pizzas').html(html);
                }
            });
        }
    </script>
@endsection
@endif