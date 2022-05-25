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
            <h2><i class="bi bi-kanban-fill"></i> Formulaire rempli : {{ $formulaireSelect->nom_formulaire }}</h2>
            <ol>
                <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                <li><a class="link sans-vert" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                <li><a class="link sans-vert" href="{{ route('form.my-list') }}">Liste de mes formulaires</a></li>
                <li><a class="link active" href="{{ route('form.show', $formulaireSelect->id) }}">{{ $formulaireSelect->nom_formulaire }}</a></li>
            </ol>
            </div>
        </div>
    </section>
    <!-- Fin breadcrumbs-->

    <div class="container mt-5" data-aos="zoom-in" >
        <div class="row text-center">
            <h2 style="font-weight:bold;">{{ $formulaireSelect->nom_formulaire }}</h2>
            <p style="margin-bottom: 0px; ">{{ $formulaireSelect->description_formulaire }} | Formulaire crée le {{ $formulaireSelect->created_at->format('d/m/Y') }} à {{ $formulaireSelect->created_at->format('H:i') }}</p>
        </div>
    </div>

    <div class="container">
        <form action="#" method="POST">
            @csrf   
                @foreach ($formulaireSelect->parts as $part)
                    <div class="container mt-3 creation-form p-5" data-aos="zoom-in">
                        <h3 class="text-center">{{ $part->titre_partie_formulaire }}</h3>
                        @foreach ($part->attribut as $attributFormulaire)
                            <div class="form-group">
                                <label class="label-form">{{ $attributFormulaire->nom_attribut_formulaire }}</label>
                                @if ($attributFormulaire->type_attribut_formulaire == 1)
                                    <input type="text" name="{{ $attributFormulaire->id }}" class="form-control form-thof form-width mb-2" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                @elseif ($attributFormulaire->type_attribut_formulaire == 2)
                                    <input type="date" name="{{ $attributFormulaire->id }}" class="form-control form-thof form-width mb-2" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                @elseif ($attributFormulaire->type_attribut_formulaire == 3)
                                    <input type="email" name="{{ $attributFormulaire->id }}" class="form-control form-thof form-width mb-2" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                @elseif ($attributFormulaire->type_attribut_formulaire == 4)
                                    <input type="file" name="{{ $attributFormulaire->id }}" class="form-control form-control-sm form-thof form-width mb-2" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                @elseif ($attributFormulaire->type_attribut_formulaire == 5)
                                    <input type="number" name="{{ $attributFormulaire->id }}" class="form-control form-thof form-width mb-2" min="{{ $attributFormulaire->nombre_min}}" max="{{ $attributFormulaire->nombre_max}}" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                @elseif ($attributFormulaire->type_attribut_formulaire == 6)
                                    <input type="tel" name="{{ $attributFormulaire->id }}" class="form-control form-thof form-width mb-2" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"/>
                                @elseif ($attributFormulaire->type_attribut_formulaire == 7)
                                    <textarea name="{{ $attributFormulaire->id }}" class="form-control form-thof form_width mb-2" id="" cols="30" rows="3" min="0" maxlength="{{ $attributFormulaire->nombre_max }}" placeholder="{{ $attributFormulaire->placeholder_attribut_formulaire }}"></textarea>
                                @elseif($attributFormulaire->type_attribut_formulaire == 8)
                                    <select name="{{ $attributFormulaire->id }}" class="form-select form-thof form-width mb-2" required>
                                        <option value="" selected disabled>Choisir une valeur</option>
                                        @foreach ($optionAttribut as $option )
                                            @if($option->attribut_formulaires_id == $attributFormulaire->id)
                                                <option class="optionCapitalize" value="{{ $option->value_options_attribut_formulaire }}">{{ $option->value_options_attribut_formulaire }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                                
                                <span class="text-danger" id="descriptionMsgError"></span> 
                            </div>
                        @endforeach  
                    </div>
                @endforeach
            <div class="container col-md-12 text-center mb-4 mt-4">
            </div>
        </form>

        <div class="row mt-5 mb-5">
            <div class="col-md-12 text-center">
                <form action="{{ route('form.destroy', $formulaireSelect->id) }}" method="POST">
                    @csrf
                    @METHOD('DELETE')
                    <button type="submit" class="btn button-red mr-5">
                        <i class="bi bi-trash-fill"></i>
                        Supprimer ce formulaire
                    </button>
                </form>
            </div>
        </div>

    </div>

    @section('fichierJS')
        <script src="{{ asset('js/gestionFormulaire.js') }}"></script>
        <script src="{{ asset('js/creationFormulaire.js') }}"></script>
        <script src="{{ asset('js/verifNewFormulaire.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/traitementAJAX.js') }}"></script>
    @endsection

@endsection
