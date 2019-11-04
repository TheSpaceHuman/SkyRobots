@if ($errors->any())
    <div class="alert alert-danger my-3" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('message-info'))
    <div class="alert alert-primary my-3" role="alert">
        {{ session('message-info') }}
    </div>
@endif
@if(session('message-danger'))
    <div class="alert alert-danger my-3" role="alert">
        {{ session('message-danger') }}
    </div>
@endif
@if(session('message-success'))
    <div class="alert alert-success my-3" role="alert">
        {{ session('message-success') }}
    </div>
@endif