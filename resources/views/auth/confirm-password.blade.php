@extends('layout.app')
@section('fichierCSS')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endsection
@section('content')
    <div class="body">
        <!--Header-->
            @include('partials.header-dashboard')
        <!-- Fin Header -->

        <!-- Breadcrumbs -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center margin-top-mobile">
                    <h2><i class="bi bi-person-circle"></i> Mon profil</h2>
                    <ol>
                        <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                        <li><a class="link sans-vert" href="{{ route('profile.show') }}">Mon profil</a></li>
                        <li><a class="link active" href="{{ url('user/confirm-password') }}">Confirmation du mot de passe</a></li>
                    </ol>
                    </div>
                </div>
            </section>
        <!-- Fin breadcrumbs-->
        
        <!-- Confirmation du mot de passe -->
        <div class="container card mt-5">
            <div class="row">
                <div class="col-md-12 border py-4">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h3>Confirmation du mot de passe</h3>
                            <h6>Pour plus de sécurité, veuillez confirmer votre mot de passe</h6>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="password" class="form-control form-thof form-width" type="password" name="password" required autofocus placeholder="Mot de passe"/>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first('password')}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg button-login fonts">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fin confirmation du mot de passe-->
    </div>
@endsection

