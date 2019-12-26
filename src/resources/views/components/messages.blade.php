<div class="container" id="messages">
    <div class="alert alert-success" role="alert">
        @if(session()->has('successMessages'))
            @foreach(session('successMessages') as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
        @isset($successMessages)
            @foreach($successMessages as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
    </div>
    <div class="alert alert-danger" role="alert">
        @if(count($errors) > 0)
            @foreach($errors->all() as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
        @if(session()->has('errorMessages'))
            @foreach(session('errorMessages') as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
        @isset($errorMessages)
            @foreach($errorMessages as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
    </div>
    <div class="alert alert-warning" role="alert">
        @if(session()->has('warningMessages'))
            @foreach(session('warningMessages') as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
        @isset($warningMessages)
            @foreach($warningMessages as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
    </div>
    <div class="alert alert-info" role="alert">
        @if(session()->has('infoMessages'))
            @foreach(session('infoMessages') as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
        @isset($infoMessages)
            @foreach($infoMessages as $message)
                <p>{{$message}}</p>
            @endforeach
        @endif
    </div>
</div>
