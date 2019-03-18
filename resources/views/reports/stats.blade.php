<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1>Raport funkcjonowania przedsiębiorstwa</h1>
    <hr>
    @foreach($stats as $s)
        <img src="{{$s}}"/>
        <hr>
    @endforeach
</body>