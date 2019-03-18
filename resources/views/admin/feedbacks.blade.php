@extends('main')
@section('title', 'Opinie użytkowników')
@section('content')
    <div id="page-wrapper">
        <!-- Main -->
        <article id="main">
            <section class="wrapper style5 fancy-back">
                <div class="inner white-back">
                    <section>
                        <header>
                            <h4>Panel Administratora</h4>
                            <p>Feedback</p>
                            <hr>
                        </header>
                    </section>
                    @include('partials._messages')
                    <h4>Wyszukiwanie</h4>
                    <form id="searchForm" action="{{ route('admin.searchfeedbacks') }}">
                        <div class="row uniform">
                            <div class="3u 12u$(xsmall)">
                                <input type="text" name="user" placeholder="Imię lub nazwisko" value="{{ old('user') }}" />
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <select name="grade">
                                    <option value="">Ocena</option>
                                    <option value="positive" @if(old('grade') === 'positive') selected @endif>Pozytywna</option>
                                    <option value="neutral" @if(old('grade') === 'negative') selected @endif>Neutralna</option>
                                    <option value="negative" @if(old('grade') === 'neutral') selected @endif>Negatywna</option>
                                </select>
                            </div>
                            <div class="3u 12u$(xsmall)">
                                {{--<input type="text" name="public" placeholder="Widoczność" value="" />--}}
                                <select name="public">
                                    <option value="">Widoczność</option>
                                    <option value="true" @if(old('public') === 'true') selected @endif>Publiczna</option>
                                    <option value="false" @if(old('public') === 'false') selected @endif>Prywatna</option>
                                </select>
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <button type="submit">Szukaj</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-wrapper">
                        <h4>Opinie wystawione przez użytkowników</h4>
                        <hr>
                            <a href="{{ route('admin.generatefpdf') }}" class="button special white dark btn-block fix-margin-top">Generuj Raport</a>
                        <hr>
                        <p>Mamy {{ $fs[0] }}
                            @if($fs[0] == 1) pozytywną @endif
                            @if($fs[0] > 1 and $fs[0] < 5) pozytywne, @endif
                            @if($fs[0] >= 5 or $fs[0] == 0) pozytywnych, @endif
                        {{ $fs[1] }}
                            @if($fs[1] == 1) neutralną i @endif
                            @if($fs[1] > 1 and $fs[1] < 5) neutralne i @endif
                            @if($fs[1] >= 5 or $fs[1] == 0) neutralnych i @endif
                        {{ $fs[2] }}
                            @if($fs[2] == 1) negatywną opinię. @endif
                            @if($fs[2] > 1 and $fs[2] < 5) negatywne opinię. @endif
                            @if($fs[2] >= 5 or $fs[2] == 0) negatywnych opinii. @endif
                        </p>
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th>Użytkownik</th>
                                <th>Nr zam..</th>
                                <th>Data zamówienia</th>
                                <th>Data wystawienia</th>
                                <th>Rodzaj opinii</th>
                                <th>Widoczność</th>
                                <th>Opinia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $f)
                                <tr>
                                    <td>{{ $f->user[0]->name.' '.$f->user[0]->surname }}</td>
                                    <td>{{ $f->order->id }}</td>
                                    <td>{{ $f->order->created_at }}</td>
                                    <td>{{ $f->created_at }}</td>
                                    @if($f->grade === 'positive')
                                        <td class="menu-green">Pozytywna</td>
                                    @elseif($f->grade === 'neutral')
                                        <td class="menu-blue">Neutralna</td>
                                    @else
                                        <td class="menu-red">Negatywna</td>
                                    @endif
                                    @if($f->public === 'true')
                                        <td class="menu-green">Publiczna</td>
                                    @else
                                        <td class="menu-blue">Prywatna</td>
                                    @endif
                                    <td>
                                        <button class="btn-info btn-sm open-modal" value="{{$f->id}}">
                                            Zobacz
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $feedback->links() !!}
                        </div>
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
                    <div class="modal fade top-margin-override" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Opinia użytkownika</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <p id="message"></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="btn-close">Zamknij</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
@endsection