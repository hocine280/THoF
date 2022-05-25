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
                <li><a class="link sans-vert" href="{{ route('form.all-list') }}">Liste de tous les formulaires</a></li>
                <li><a class="link active" href="{{ route('form.show', $formulaireSelect->id) }}">{{ $formulaireSelect->nom_formulaire }}</a></li>
            </ol>
            </div>
        </div>
    </section>
    <!-- Fin breadcrumbs-->

    @include('partials.alert-message-danger');

    <!-- Création de formulaire -->
    <div class="container mt-5" data-aos="zoom-in" >
        <div class="row text-center">
            <h2 style="font-weight:bold;">{{ $formulaireSelect->nom_formulaire }}</h2>
            <p style="margin-bottom: 0px; ">{{ $formulaireSelect->description_formulaire }} | Formulaire crée le {{ $formulaireSelect->created_at->format('d/m/Y') }} 
                à {{ $formulaireSelect->created_at->format('H:i') }} par @foreach($auteurFormulaire as $auteur) {{ $auteur->nom }} {{ $auteur->prenom }}@endforeach
            </p>
        </div>
    </div>
    <div class="container mb-4 mt-4 " data-aos="fade-down-left">
        <div class="row button-pdf">
            <div class="col-md-12">
                <a href="{{ route('download.pdf', $formulaireSelect->id) }}" class="btn button-red"><i class="bi bi-file-earmark-pdf-fill"></i>Générer un PDF</a>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('demande.store', $formulaireSelect->id) }}" method="POST" enctype="multipart/form-data">
            @csrf   
                @foreach ($formulaireSelect->parts as $part)
                    <div class="container mt-3 creation-form p-5" data-aos="zoom-in">
                        <h3 class="text-center">{{ $part->titre_partie_formulaire }}</h3>
                        @foreach ($part->attribut as $attributFormulaire)
                            <div class="form-group">
                                <label class="label-form">{{ $attributFormulaire->nom_attribut_formulaire }}</label>
                                @if ($attributFormulaire->type_attribut_formulaire == 1)
                                    <input type="text" name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-control form-thof form-width @error("champ"."$attributFormulaire->id") is-invalid @enderror" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @elseif ($attributFormulaire->type_attribut_formulaire == 2)
                                    <input type="date" name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @elseif ($attributFormulaire->type_attribut_formulaire == 3)
                                    <input type="email" name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
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
                                    <input type="file" name="champ{{ $attributFormulaire->id }}" value="fichier" class="form-control form-control-sm form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @elseif ($attributFormulaire->type_attribut_formulaire == 5)
                                    <input type="number" name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" min="{{ $attributFormulaire->nombre_min}}" max="{{ $attributFormulaire->nombre_max}}" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @elseif ($attributFormulaire->type_attribut_formulaire == 6)
                                    <input type="tel" name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-control form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @elseif ($attributFormulaire->type_attribut_formulaire == 7)
                                    <textarea name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-control form-thof form_width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" id="" cols="30" rows="3" min="0" maxlength="{{ $attributFormulaire->nombre_max }}" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"></textarea>
                                    @error("champ"."$attributFormulaire->id")
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first("champ"."$attributFormulaire->id")}}</span>
                                        </div>
                                    @enderror
                                @elseif($attributFormulaire->type_attribut_formulaire == 8)
                                    <select name="champ{{ $attributFormulaire->id }}" value="{{ old("champ".$attributFormulaire->id) }}" class="form-select form-thof form-width mt-2 @error("champ"."$attributFormulaire->id") is-invalid @enderror" required>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                    </svg>
                    Créer une demande
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
