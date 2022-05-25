@extends('layout/error')

@section('img')
    <img src="{{ asset("img/chuck_norris/temps.png") }}" alt="Chuck Norris Erreur 419" width="30%">
@endsection

@section('code', '419')
@section('message', __('Page Expired'))

@section('info')
    <p>Chuck Norris n'a pas ton temps</p>
@endsection