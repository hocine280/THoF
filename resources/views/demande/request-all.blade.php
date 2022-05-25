@extends('layout.app')
    @section('fichierCSS')
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/breadcrumbs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
        <link rel="stylesheet" href="{{ asset('css/alert-message.css') }}">
        <link rel="stylesheet" href="{{ asset('css/request-progress.css') }}">

    @endsection

    @section('content')
        <!-- Header -->
            @include('partials.header-dashboard')
        <!-- Fin Header -->

        <!-- Breadcrumbs -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
                    <h2><i class="bi bi-hourglass-split"></i> Toutes mes demandes</h2>
                    <ol>
                        <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                        <li><a class="link sans-vert" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li><a class="link active" href="{{ route('demande.request-all') }}">Toutes mes demandes</a></li>
                    </ol> 
                    </div>
                </div>
            </section>
        <!-- Fin breadcrumbs-->

        <!-- Message de succès -->
            @include('partials.alert-message')
        <!-- Fin message de succès -->
        <div class="container">
            <h6 class="mt-4">Vous pouvez consulter tous les demandes que vous avez créés :</h6>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="container card mt-4 p-2 nb-demande-info">
                <div class="row text-center">
                    <div class="col-md-4">
                        @if ($nbRepEnCours == 1)
                            Nombre de demande en cours : {{ $nbRepEnCours }}
                        @elseif ($nbRepEnCours == 0)
                            Aucune demande en cours n'a été effectuée
                        @elseif ($nbRepEnCours > 1)
                            Nombre de demandes en cours : {{ $nbRepEnCours }}
                        @endif
                    </div>
                    <div class="col-md-4">
                        @if ($nbRepRefusee == 1)
                            Nombre de demande refusée : {{ $nbRepRefusee }}
                        @elseif ($nbRepRefusee == 0)
                            Aucune de vos demandes n'a été refusée
                        @elseif ($nbRepRefusee > 1)
                            Nombre de demandes refusées : {{ $nbRepRefusee }}
                        @endif
                    </div>
                    <div class="col-md-4">
                        @if ($nbRepTerminee == 1)
                            Nombre de demande refusée : {{ $nbRepTerminee }}
                        @elseif ($nbRepTerminee == 0)
                            Aucune de vos demandes n'a été confirmée
                        @elseif ($nbRepTerminee > 1)
                            Nombre de demandes confirmées : {{ $nbRepTerminee }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
            
        <!-- Affichage des demandes --> 
            <div class="container" data-aos="zoom-in">
                @forelse ($allDemande as $demande)
                    @if($demande->statut_demande_id == 1)
                        <a href="{{ route('demande.show-all', $demande->id) }}">
                            <div class="container card mt-4">
                                <div class="row">
                                    <div class="col-md-12 border p-3">
                                        <div class="row">
                                            <div class="col-md-1 col-2 text-center"><i class="bi bi-three-dots icon-reply"></i></div>
                                            <div class="col-md-8 col-5 part-text">
                                                <p class="text-partie-dashboard">{{ $demande->formulaire->nom_formulaire }}</p>  
                                                <p style="font-size:13px; margin-bottom : 0px; ">{{ $demande->formulaire->description_formulaire }}</p>
                                            </div>
                                            <div class="col-md-3 col-5 part-text text-right"><p class="text-partie-demande-creation">Demande crée le {{ $demande->created_at->format('d/m/Y') }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @elseif ($demande->statut_demande_id == 2)
                        <a href="{{ route('demande.show-all', $demande->id) }}">
                            <div class="container card mt-4">
                                <div class="row">
                                    <div class="col-md-12 border p-3">
                                        <div class="row">
                                            <div class="col-md-1 col-2 text-center"><i class="bi bi bi-x-lg icon-reply icon-red"></i></div>
                                            <div class="col-md-8 col-5 part-text">
                                                <p class="text-partie-dashboard">{{ $demande->formulaire->nom_formulaire }}</p>  
                                                <p style="font-size:13px; margin-bottom : 0px; ">{{ $demande->formulaire->description_formulaire }}</p>
                                            </div>
                                            <div class="col-md-3 col-5 part-text text-right"><p class="text-partie-demande-creation">Demande crée le {{ $demande->created_at->format('d/m/Y') }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @elseif($demande->statut_demande_id == 3)
                    <a href="{{ route('demande.show-all', $demande->id) }}">
                        <div class="container card mt-4">
                            <div class="row">
                                <div class="col-md-12 border p-3">
                                    <div class="row">
                                        <div class="col-md-1 col-2 text-center"><i class="bi bi-check2 icon-reply"></i></div>
                                        <div class="col-md-8 col-5 part-text">
                                            <p class="text-partie-dashboard">{{ $demande->formulaire->nom_formulaire }}</p>  
                                            <p style="font-size:13px; margin-bottom : 0px; ">{{ $demande->formulaire->description_formulaire }}</p>
                                        </div>
                                        <div class="col-md-3 col-5 part-text text-right"><p class="text-partie-demande-creation">Demande crée le {{ $demande->created_at->format('d/m/Y') }}</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                @empty
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-dismissible fade show alert-danger-alt mt-4" role="alert">
                                    <p class="mb-1 mt-1 text-center"><i class="bi bi-shield-exclamation "></i> Aucune demande n'a été créé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        {{$allDemande->links()}}
                    </div>
                </div>
            </div>    
        <!-- Fin affichage des demandes -->
    @endsection 