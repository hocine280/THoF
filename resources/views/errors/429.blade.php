@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/calme.png") }}" alt="Chuck Norris Erreur 429">
@endsection

@section('code', '429')
@section('message', __('Too Many Requests'))

@section('info')
    <p>Oooooh tu te calmes avec les requêtes sinon c'est Chuck Norris qui va te calmer !</p>
@endsection