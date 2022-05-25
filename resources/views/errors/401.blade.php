@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/doigt.jpg") }}" alt="Chuck Norris Erreur 401" width="50%">
@endsection

@section('code', '401')
@section('message', __('Unauthorized'))

@section('info')
    <p>Houlà t'as pas l'air d'être autorisé d'aller par là toi !</p>
@endsection
