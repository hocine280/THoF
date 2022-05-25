@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/clin_oeil.png") }}" alt="Chuck Norris Erreur 503">
@endsection

@section('code', '503')
@section('message', __('Service Unavailable'))

@section('info')
    <p>Chuck Norris n'est pas là car aucune demande est irréalisable pour Chuck Norris</p>
@endsection