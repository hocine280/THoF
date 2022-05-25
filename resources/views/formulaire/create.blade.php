@extends('layout.app')

@section('fichierMeta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('fichierCSS')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

    <!--Header-->
    @include('partials.header-dashboard')
    <!-- Fin Header -->

    <!-- Breadcrumbs -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
                <h2><i class="bi bi-ui-checks"></i> Création de formulaire</h2>
                <ol>
                    <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                    <li><a class="link sans-vert" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li><a class="link active" href="{{ route('form.create') }}">Créer un formulaire</a></li>
                </ol>
                </div>
            </div>
        </section>
    <!-- Fin breadcrumbs-->

    <!-- Création de formulaire -->
    <div class="container mt-5" data-aos="zoom-in" >
        <div class="row text-center">
            <h2 style="font-weight:bold;">Créer votre formulaire</h2>
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
            Votre formulaire a été crée avec succès !
        </div>
    </div>
    
    <form action="{{ route('form.store') }}" method="POST" id="creationFormulaire">
        @csrf
        <div class="container mt-5 creation-form p-5" data-aos="fade-right">
            <h3 class="text-center">Informations générales</h3>
            <div class="form-group mb-3">
                <label class="label-form"> Titre du formulaire </label>
                <input type="text" class="form-control form-thof form-width @error('titreFormulaire') is-invalid @enderror" id="titreFormulaire" name="titreFormulaire" placeholder="Ex : Demande de stage" onkeyup="modifTitreFormulaire()">
                <span class="text-danger" id="titreMsgError"></span> 

            </div>
            <div class="form-group">
                <label class="label-form">Description du formulaire</label>
                <textarea name="description" id="" cols="30" rows="1" class="form-control form-thof form-width " placeholder="Ex : Permet d'effectuer une convention de stage"></textarea>
                <span class="text-danger" id="descriptionMsgError"></span> 
            </div>
            <label class="label-form">Formulaire remplie par</label>
            <select name="formulaire_rempli_par" class="form-select form-thof form-width" required>
                <option value="" selected disabled>Choisir une valeur</option>
                <option value="1">Etudiant</option>
                <option value="2">Professeur</option>
                <option value="3">Administrateur</option>
                <option value="4">Personne extérieure</option>
            </select>
            <span class="text-danger" id="formulaireRempliParMsgError"></span>
        </div>
            
        <input type="hidden" id="nbParts" name="nbParts" value="1">
        <div id="formulaire">
            <div id="parts0"  class="mb-3 form-parts container mt-5 creation-form p-5 mb-5" data-aos="zoom-in">
                <input type="hidden" id="nbChamp0" name="nbChamp0" value="0">
                <h4 class="text-center">Partie n°1</h4>

                <div class="form-group mb-4">
                    <label class="label-form"> Titre de la partie </label>
                    <input type="text" name="titrePartie0" id="titrePartie0" class="form-control form-thof form-width" placeholder="Ex : Informations personnelles" required onkeyup="modifTitrePartie(0)">
                    <span class="text-danger" id="titrePartieMsgError0"></span> 

                </div>
                
                <button type="button" onclick="openMenu(0)" class="btn-parts btn button-green">Ajouter</button>
                <button type="button" onclick="supprimerPartie(0)" class="btn-parts btn button-red">Supprimer partie</button>
                
                <ul class="mt-2 menuItem">
                    <li><button type="button" class="btn" onclick="ajouterPartie()">Ajouter une partie</button></li>
                    <li><button type="button" class="btn" onclick="ajouterElement(0)">Ajouter un champ</button></li>
                    <li><button type="button" class="btn" onclick="ajouterSelect(0)">Ajouter liste déroulante</button></li>
                </ul>
            </div>
        </div>
        
        <div class="container col-md-12 text-center mb-4">
            <button type="submit" class="btn button-green" id="buttonSubmit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                </svg>
                Créer
            </button>
        </div>
        
    </form>


    <!-- Fin de création de formulaire -->
    @section('fichierJS')
        <script src="{{ asset('js/gestionFormulaire.js') }}"></script>
        <script src="{{ asset('js/creationFormulaire.js') }}"></script>
        <script src="{{ asset('js/verifNewFormulaire.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/traitementAJAX.js') }}"></script>
    @endsection

@endsection