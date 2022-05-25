@php
    use App\Models\Formulaire\AttributFormulaire;
    use App\Models\Demande\ValeurDemande;
    use App\Models\Demande\PieceJointe;
@endphp
@extends('layout.app')

@section('fichierMeta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('fichierCSS')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alert-message.css') }}">
@endsection

@section('content')

    <!--Header-->
    @include('partials.header-dashboard')
    <!-- Fin Header -->

    <!-- Breadcrumbs -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
            <h2><i class="bi bi-kanban-fill"></i> Formulaire rempli : {{ $formulaireSelect->nom_formulaire }}</h2>
            <ol>
                <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                <li><a class="link sans-vert" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                <li><a class="link sans-vert" href="{{ route('reply-formulaire.index') }}">Réponse de mes formulaires</a></li>
                <li><a class="link active" >{{ $formulaireSelect->nom_formulaire }}</a></li>
            </ol>
            </div>
        </div>
    </section>
    <!-- Fin breadcrumbs-->

    <!-- Message de succès -->
        @include('partials.alert-message')
    <!-- Fin message de succès -->

    <!-- Création de formulaire -->
    <div class="container mt-5" data-aos="zoom-in">
        <div class="row text-center">
            <h2 style="font-weight:bold;">{{ $formulaireSelect->nom_formulaire }}</h2>
            <p style="margin-bottom: 0px; ">{{ $formulaireSelect->description_formulaire }} 
                | Demande crée le 
                    {{ $demande->created_at->format('d/m/Y') }} à {{ $demande->created_at->format('H:i') }} 
                par 
                @foreach ($auteurDemande as $auteur)
                    {{ $auteur->nom }} {{ $auteur->prenom }}
                @endforeach
            </p>
        </div>
    </div>
        @foreach ($formulaireSelect->parts as $part)
        <div class="container mt-3 creation-form p-5" data-aos="zoom-in">
            <h3 class="text-center">{{ $part->titre_partie_formulaire }}</h3>
            @foreach ($part->attribut as $attributFormulaire)
                <div class="form-group">
                    <label class="label-form">{{ $attributFormulaire->nom_attribut_formulaire }}</label>
                    @if ($attributFormulaire->type_attribut_formulaire == 1)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>
                        
                    @elseif ($attributFormulaire->type_attribut_formulaire == 2)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>                       
                    @elseif ($attributFormulaire->type_attribut_formulaire == 3)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>                        
                    @elseif ($attributFormulaire->type_attribut_formulaire == 4)
                    <div class="row">
                        <div class="col-md-6">
                            <span class="form-control form-thof form-width ">
                                @php
                                    $piece_jointe = PieceJointe::where('demande_id','=', $demande->id)->get(); 
                                @endphp
                               @foreach($piece_jointe as $pj)
                                {{ $pj->nom_pj }}
                               @endforeach
                            </span> 
                        </div>
                        <div class="col-md-6 text-right">
                            @foreach ($piece_jointe as $pj)
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <a href={{ asset('storage/'.$pj->path_pj) }} class="btn button-download-size button-blue mr-5 text-center">
                                            <i class="bi bi-eye-fill"></i>
                                            Voir le fichier
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('demande.download',$demande->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn button-download-size button-green mr-5 text-center">
                                                <i class="bi bi-download"></i>
                                                Télécharger le fichier
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>          
                    @elseif ($attributFormulaire->type_attribut_formulaire == 5)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>                     
                    @elseif ($attributFormulaire->type_attribut_formulaire == 6)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>                      
                    @elseif ($attributFormulaire->type_attribut_formulaire == 7)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>                       
                    @elseif($attributFormulaire->type_attribut_formulaire == 8)
                        <span class="form-control form-thof form-width ">
                            @php
                                $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                            @endphp
                            @foreach ($valeurDemande as $valeur)
                                @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                    {{ $valeur->valeur_champ }}
                                @endif
                            @endforeach
                        </span>
                    @endif
                                                   
                </div>
            @endforeach  
            
        </div>
    @endforeach
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-12 text-center">
                @if($demande->statut_demande_id == 1 )
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('reply-formulaire.refusedReply', $demande->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn button-red mr-5 text-center">
                                    <i class="bi bi-x-lg"></i>
                                    Refusée cette demande
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('reply-formulaire.update', $demande->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn button-green mr-5 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
                                      </svg>
                                    Confirmer cette demande
                                </button>
                            </form>
                        </div>
                    </div>
                @elseif ($demande->statut_demande_id == 3)
                    <div class="button-blue">
                        <span class="mt-0 mb-0"><i class="bi bi-info-circle-fill"></i> Vous avez confirmée cette demande</span>
                    </div>
                @elseif ($demande->statut_demande_id == 2)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="button-blue">
                                <span class="mt-0 mb-0"><i class="bi bi-info-circle-fill"></i> Vous avez refusée cette demande</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('reply-formulaire.update', $demande->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn button-green mr-5 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
                                        </svg>
                                    Confirmer cette demande
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    

    <!-- Fin de création de formulaire -->

    @section('fichierJS')
        <script src="{{ asset('js/gestionFormulaire.js') }}"></script>
        <script src="{{ asset('js/creationFormulaire.js') }}"></script>
        <script src="{{ asset('js/verifNewFormulaire.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/traitementAJAX.js') }}"></script>
    @endsection

@endsection
