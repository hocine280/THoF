@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/regard.png") }}" alt="Chuck Norris Erreur 404" width="90%">
@endsection

@section('code', '404')
@section('message', __('Not Found'))

@section('info')
    <p>Aïe Aïe Aïe la page n'a pas été trouvée ... Pourtant rien n'échappe à Chuck Norris !</p>
@endsection
