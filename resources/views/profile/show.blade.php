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
                <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
                <h2><i class="bi bi-person-circle"></i> Mon profil</h2>
                <ol>
                    <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                    <li><a class="link active" href="{{ route('profile.show') }}">Mon profil</a></li>
                </ol>
                </div>
            </div>
        </section>
        <!-- Fin breadcrumbs-->

        <!-- Message de succès -->
            @if(session('success'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show alert-success-alt mt-4" role="alert">
                                <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-circle icon-close"></i> {{session('success')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        <!-- Fin du message de succès -->

        <!-- Information du profil -->
        <div class="container card mt-5">
            <div class="row">
                <div class="col-md-12 border p-4">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @include('profile.update-profile-information-form')
                    @endif
                </div>
            </div>
        </div>
        <!-- Fin de l'information du profil -->

        <!-- Mise à jour du mot de passe -->
        <div class="container card mt-5">
            <div class="row">
                <div class="col-md-12 border p-4">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @include('profile.update-password-form')
                        </div> 

                        <x-jet-section-border />
                    @endif
                </div>
            </div>
        </div>
        <!-- Fin de la mise à jour du mot de passe -->

        <!-- Activer la double authentification -->
        <div class="container card mt-5">
            <div class="row">
                <div class="col-md-12 border p-4">
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
        
                        <x-jet-section-border />
                    @endif
                </div>
            </div>
        </div>
        <!-- Fin activer la double authentification -->

        <!-- Session de navigation -->
        <div class="container card mt-5">
            <div class="row">
                <div class="col-md-12 border p-4">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>
        </div>
        <!-- Fin session de navigation -->
        <br><br>
        @include('partials.footer')
    </div>
@endsection

@section('fichierJS')
    <script src="{{ asset('js/profil.js') }}"></script>
@endsection