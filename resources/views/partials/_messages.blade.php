@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Udało się:</strong> {{ Session::get('success') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Błędy:</strong>
        <ul style='list-style-type: none'>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif