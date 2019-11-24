@extends('layouts.app')

@section('content')
    @foreach ($data as $message)
        @component('components/inboxListItem', ['message' => $message])
        @endcomponent
    @endforeach
@endsection
