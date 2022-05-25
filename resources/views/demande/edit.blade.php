@php
    use App\Models\Demande\ValeurDemande;
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
                <li><a class="link sans-vert" href="{{ route('demande.index') }}">Mes demandes en cours</a></li>
                <li><a class="link active" href="{{ route('form.show', $formulaireSelect->id) }}">{{ $formulaireSelect->nom_formulaire }}</a></li>
            </ol>
            </div>
        </div>
    </section>
    <!-- Fin breadcrumbs-->

    <div class="container mt-5" data-aos="zoom-in" >
        <div class="row text-center">
            <h2 style="font-weight:bold;">{{ $formulaireSelect->nom_formulaire }}</h2>
            <p style="margin-bottom: 0px; ">{{ $formulaireSelect->description_formulaire }} | Formulaire crée le {{ $formulaireSelect->created_at->format('d/m/Y') }} 
                à {{ $formulaireSelect->created_at->format('H:i') }} par @foreach($auteurFormulaire as $auteur) {{ $auteur->nom }} {{ $auteur->prenom }}@endforeach
            </p>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('demande.update', ['idFormulaire'=>$formulaireSelect->id, 'idDemande'=> $demande->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf   
                @foreach ($formulaireSelect->parts as $part)
                    <div class="container mt-3 creation-form p-5" data-aos="zoom-in">
                        <h3 class="text-center">{{ $part->titre_partie_formulaire }}</h3>
                        @foreach ($part->attribut as $attributFormulaire)
                            <div class="form-group">
                                <label class="label-form">{{ $attributFormulaire->nom_attribut_formulaire }}</label>

                                @if ($attributFormulaire->type_attribut_formulaire == 1)
                                    <input type="text" name="champ{{ $attributFormulaire->id }}" 
                                        @php
                                            $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="{{ $valeur->valeur_champ }}"
                                            @endif
                                        @endforeach  
                                        class="form-control form-thof form-width @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                        placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror

                                @elseif ($attributFormulaire->type_attribut_formulaire == 2)
                                    <input type="date" name="champ{{ $attributFormulaire->id }}" 
                                        @php
                                            $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="{{ $valeur->valeur_champ }}"
                                            @endif
                                        @endforeach 
                                        class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                        placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror
                                        
                                @elseif ($attributFormulaire->type_attribut_formulaire == 3)
                                    <input type="email" name="champ{{ $attributFormulaire->id }}"
                                        @php
                                        $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="{{ $valeur->valeur_champ }}"
                                            @endif
                                        @endforeach 
                                        class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                        placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror

                                @elseif ($attributFormulaire->type_attribut_formulaire == 4)
                                    @if ($attributFormulaire->type_fichier_id == 1)
                                        <span class="label-form "> | Fichier autorise : <span class="label-form fichier-extension">.png</span></span>
                                    @elseif($attributFormulaire->type_fichier_id == 2)
                                        <span class="label-form "> | Fichier autorisé : <span class="label-form fichier-extension">.jpg</span></span>
                                    @elseif($attributFormulaire->type_fichier_id == 3)
                                    <span class="label-form"> | Fichier autorisé : <span class="label-form fichier-extension">.pdf</span></span>
                                    @endif
                                    <input type="file" name="champ{{ $attributFormulaire->id }}"  value="fichier"
                                        @php
                                            $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="ficher"
                                            @endif
                                        @endforeach 
                                        class="form-control form-control-sm form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                        placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror
                                        
                                @elseif ($attributFormulaire->type_attribut_formulaire == 5)
                                    <input type="number" name="champ{{ $attributFormulaire->id }}" 
                                        @php
                                        $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="{{ $valeur->valeur_champ }}"
                                            @endif
                                        @endforeach 
                                        class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                        min="{{ $attributFormulaire->nombre_min}}" max="{{ $attributFormulaire->nombre_max}}" 
                                        placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror

                                @elseif ($attributFormulaire->type_attribut_formulaire == 6)
                                    <input type="tel" name="champ{{ $attributFormulaire->id }}" 
                                        @php
                                            $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="{{ $valeur->valeur_champ }}"
                                            @endif
                                        @endforeach 
                                        class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                        placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror

                                @elseif ($attributFormulaire->type_attribut_formulaire == 7)
                                    
                                        @php
                                            $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                            <textarea name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" 
                                                class="form-control form-thof form_width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" 
                                                id="" cols="30" rows="3" min="0" maxlength="{{ $attributFormulaire->nombre_max }}" 
                                                placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}">{{ $valeur->valeur_champ }}
                                            @endif
                                        @endforeach </textarea>
                                        @error("champ"."$attributFormulaire->id")
                                            <div class="invalid-feedback">
                                                <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                            </div>
                                        @enderror

                                @elseif($attributFormulaire->type_attribut_formulaire == 8)
                                    <select name="champ{{ $attributFormulaire->id }}"
                                        @php
                                            $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id)->get(); 
                                        @endphp
                                        @foreach ($valeurDemande as $valeur)
                                            @if ($attributFormulaire->id == $valeur->attribut_formulaire_id)
                                                value="{{ $valeur->valeur_champ }}"
                                            @endif
                                        @endforeach 
                                        class="form-select form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" required>
                                        <option value="" selected disabled>Choisir une valeur</option>
                                        @foreach ($optionAttribut as $option )
                                            @if($option->attribut_formulaires_id == $attributFormulaire->id)
                                                <option class="optionCapitalize" value="{{ $option->value_options_attribut_formulaire }}">{{ $option->value_options_attribut_formulaire }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @endif                             
                            </div>
                        @endforeach  
                    </div>
                @endforeach
            <div class="container col-md-12 text-center mb-4 mt-4">
                <button type="submit" class="btn button-green m" id="buttonSubmit">
                    <i class="bi bi-check-circle-fill"></i>
                    Modifier la demande
                </button>
            </div>
        </form>
    </div>
    @section('fichierJS')
        <script src="{{ asset('js/gestionFormulaire.js') }}"></script>
        <script src="{{ asset('js/creationFormulaire.js') }}"></script>
        <script src="{{ asset('js/verifNewFormulaire.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/traitementAJAX.js') }}"></script>
    @endsection

@endsection
