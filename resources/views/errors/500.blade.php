@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/probleme.png") }}" alt="Chuck Norris Erreur 500">
@endsection

@section('code', '500')
@section('message', __('Server Error'))

@section('info')
    <p>Bon ... Là la situation est critique. Heureusement Chuck Norris est sur le coup !</p>
@endsection
