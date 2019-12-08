@extends('layouts.app')

@section('content')
    @foreach ($data as $message)
        @component('components/inboxListItem', ['message' => $message])
        @endcomponent
    @endforeach
    @if(count($data) <= 0)
        <div class="jumbotron">
            <h1>{{__('inbox_text.empty_inbox')}}</h1>
        </div>
    @endif

@endsection
