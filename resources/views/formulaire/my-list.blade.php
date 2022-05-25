@extends('layout.app')
    @section('fichierCSS')
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/breadcrumbs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('css/alert-message.css') }}">

    @endsection

    @section('content')
        <!-- Header -->
            @include('partials.header-dashboard')
        <!-- Fin Header -->

        <!-- Breadcrumbs -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
                    <h2><i class="bi bi-journal-bookmark-fill"></i> Mes formulaires crées</h2>
                    <ol>
                        <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                        <li><a class="link sans-vert" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li><a class="link active" href="{{ route('form.all-list') }}">Liste de mes formulaires</a></li>
                    </ol>
                    </div>
                </div>
            </section>
        <!-- Fin breadcrumbs-->

        <!-- Message de succès -->
            @include('partials.alert-message')
        <!-- Fin du message de succès -->

        <!-- Affichage des demandes --> 
            <div class="container" data-aos="zoom-in">
                <h6 class="mt-4">Vous pouvez consulter tous les formulaires que vous avez créés :</h6>
                @forelse ($formulaire as $oneFormulaire )
                    <a href="{{ route('form.show', $oneFormulaire->id) }}">
                        <div class="container card mt-4">
                            <div class="row">
                                <div class="col-md-12 border p-3">
                                    <div class="row">
                                        <div class="col-md-1 col-2 text-center"><i class="bi bi-ui-radios icon-section"></i></div>
                                        <div class="col-md-8 col-5 part-text"><p class="text-partie-dashboard">{{ $oneFormulaire->nom_formulaire }} </p>  <p style="font-size:13px; margin-bottom : 0px; ">{{ $oneFormulaire->description_formulaire }}</p></div>
                                        <div class="col-md-3 col-5 part-text text-right"><p class="text-partie-demande-creation">Formulaire crée le {{ $oneFormulaire->created_at->format('d/m/Y') }} </p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-dismissible fade show alert-danger-alt mt-4" role="alert">
                                    <p class="mb-1 mt-1 text-center"><i class="bi bi-shield-exclamation "></i> Vous n'avez créé aucun formulaire</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="row mt-2">
                    <div class="col-md-12 text-center">
                        {{$formulaire->links()}}
                    </div>
                </div>
                <div class="col-md-12 mt-4 text-center mb-4">
                    <a class="btn button-green" href={{ route('form.create') }}><i class="bi bi-plus-circle-fill"></i> Créer un nouveau formulaire</a>
                </div>
            </div> 
        <!-- Fin affichage des demandes -->
    @endsection 