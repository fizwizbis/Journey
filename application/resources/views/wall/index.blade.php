@extends('layouts/layout')
@section('title')The wall !@endsection
@section('content')

    @if ($message = Session::has('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif

    <form method="POST" action="{{ route('wallWrite') }}">
        @csrf
        <input type="text" name="message">
        <input type="submit" value="write message">
    </form>

    <br>

    @foreach($messages as $message)
        <li>
            {{ $message->message }}
            @auth
                <a href="{{ route('wallDelete', ['id' => $message->id]) }}">Supprimer</a>
            @endauth
        </li>

    @endforeach
@endsection