@php
use App\Models\Utilisateur\User;
@endphp
@extends('layout.app')
    @section('fichierCSS')
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/breadcrumbs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
        <link rel="stylesheet" href="{{ asset('css/alert-message.css') }}">
        <link rel="stylesheet" href="{{ asset('css/reply-formulaire.css') }}">
    @endsection

    @section('content')
        <!-- Header -->
            @include('partials.header-dashboard')
        <!-- Fin Header -->

        <!-- Breadcrumbs -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
                    <h2><i class="bi bi-hourglass-split"></i> Réponse de mes formulaires</h2>
                    <ol>
                        <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                        <li><a class="link sans-vert" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li><a class="link active" href="{{ route('reply-formulaire.index') }}">Réponse de mes formulaires</a></li>
                    </ol>
                    </div>
                </div> 
            </section>
        <!-- Fin breadcrumbs-->

        <!-- Message de succès -->
            @include('partials.alert-message')
        <!-- Fin message de succès -->

        <div class="container mt-4">
            <h6>Vous pouvez consulter la réponse des autres utilisateurs à vos différents formulaires que vous avez créés au préalable</h6>
        </div>


        <!-- Affichage des demandes --> 
        <div class="container" data-aos="zoom-in">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Demande non traité
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @forelse ($myReponseEnCours as $demande)
                                <a href="{{ route('reply-formulaire.show', $demande->id) }}">
                                    <div class="container card mt-3">
                                        <div class="row">
                                            <div class="col-md-12 border p-3">
                                                <div class="row">
                                                    <div class="col-md-1 col-2 text-center"><i class="bi bi-three-dots icon-reply"></i></div>
                                                    <div class="col-md-8 col-5 part-text">
                                                        <p class="text-partie-dashboard">{{ $demande->formulaire->nom_formulaire }}</p>  
                                                        <p style="font-size:13px; margin-bottom : 0px; ">{{ $demande->formulaire->description_formulaire }}</p>
                                                    </div>
                                                    <div class="col-md-3 col-5 part-text text-right">
                                                        <p class="text-partie-demande-creation">Demande crée le {{ $demande->created_at->format('d/m/Y') }} <br> par 
                                                            @php
                                                                $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
                                                            @endphp
                                                            @foreach ($auteurDemande as $auteur)
                                                                {{ $auteur->nom }} {{ $auteur->prenom }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>                                        
                            @empty                    
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-dismissible fade show alert-danger-alt mt-4" role="alert">
                                                <p class="mb-1 mt-1 text-center"><i class="bi bi-shield-exclamation "></i> Vous avez aucune réponse non confirmée</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Demande refusée
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @forelse ($myReponseRefusee as $demande)
                                <a href="{{ route('reply-formulaire.show', $demande->id) }}">
                                    <div class="container card mt-3">
                                        <div class="row">
                                            <div class="col-md-12 border p-3">
                                                <div class="row">
                                                    <div class="col-md-1 col-2 text-center"><i class="bi bi bi-x-lg icon-reply icon-red"></i></div>
                                                    <div class="col-md-8 col-5 part-text">
                                                        <p class="text-partie-dashboard">{{ $demande->formulaire->nom_formulaire }}</p>  
                                                        <p style="font-size:13px; margin-bottom : 0px; ">{{ $demande->formulaire->description_formulaire }}</p>
                                                    </div>
                                                    <div class="col-md-3 col-5 part-text text-right">
                                                        <p class="text-partie-demande-creation">Demande crée le {{ $demande->created_at->format('d/m/Y') }} <br> par 
                                                            @php
                                                                $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
                                                            @endphp
                                                            @foreach ($auteurDemande as $auteur)
                                                                {{ $auteur->nom }} {{ $auteur->prenom }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>                                        
                            @empty                    
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-dismissible fade show alert-danger-alt mt-4" role="alert">
                                                <p class="mb-1 mt-1 text-center"><i class="bi bi-shield-exclamation "></i> Vous avez aucune réponse non confirmée</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Demande confirmée
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @forelse ($myReponseTerminee as $demande)
                                <a href="{{ route('reply-formulaire.show', $demande->id) }}">
                                    <div class="container card mt-3">
                                        <div class="row">
                                            <div class="col-md-12 border p-3">
                                                <div class="row">
                                                    <div class="col-md-1 col-2 text-center"><i class="bi bi-check2 icon-reply"></i></div>
                                                    <div class="col-md-8 col-5 part-text">
                                                        <p class="text-partie-dashboard">{{ $demande->formulaire->nom_formulaire }}</p>  
                                                        <p style="font-size:13px; margin-bottom : 0px; ">{{ $demande->formulaire->description_formulaire }}</p>
                                                    </div>
                                                    <div class="col-md-3 col-5 part-text text-right">
                                                        <p class="text-partie-demande-creation">Demande crée le {{ $demande->created_at->format('d/m/Y') }} <br> par 
                                                            @php
                                                                $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
                                                            @endphp
                                                            @foreach ($auteurDemande as $auteur)
                                                                {{ $auteur->nom }} {{ $auteur->prenom }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>                                        
                            @empty                    
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-dismissible fade show alert-danger-alt mt-4" role="alert">
                                                <p class="mb-1 mt-1 text-center"><i class="bi bi-shield-exclamation "></i> Vous avez aucune réponse non confirmée</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin affichage des demandes -->
    @endsection 