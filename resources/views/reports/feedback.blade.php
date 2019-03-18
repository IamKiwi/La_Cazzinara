<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Raport opinii użytkowników</h1>
            <hr>
            <br>
        </div>
    </div>
</div>
<table id="table" class="table table-bordered">
    <thead>
    <tr>
        <th class="text-center">Użytkownik</th>
        <th class="text-center">Nr zam..</th>
        <th class="text-center">Data wystawienia</th>
        <th class="text-center">Rodzaj opinii</th>
        <th class="text-center">Opinia</th>
    </tr>
    </thead>
    <tbody>
    @foreach($feedback as $f)
        <tr>
            <td class="text-center">{{ $f->user[0]->name.' '.$f->user[0]->surname }}</td>
            <td class="text-center">{{ $f->order->id }}</td>
            <td class="text-center">{{ $f->created_at }}</td>
            @if($f->grade === 'positive')
                <td class="text-center" style="color: green;">Pozytywna</td>
            @elseif($f->grade === 'neutral')
                <td class="text-center" style="color: blue;">Neutralna</td>
            @else
                <td class="text-center" style="color: red;">Negatywna</td>
            @endif
            <td class="text-center">
                {{ $f->message }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>