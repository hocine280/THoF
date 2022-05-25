@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/doigt.jpg") }}" alt="Chuck Norris Erreur 403" width="50%">
@endsection

@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section('info')
    <p>Bah dis donc tu vas où comme ça ? T'as cru que Chuck allait te laisser passer ?</p>
@endsection
