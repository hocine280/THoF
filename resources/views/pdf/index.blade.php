<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/generate-pdf.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

    <title></title>
</head>
<body class="body">
    <div class="">
        <div class="row">
            <div class="text-center">
                <img class="logo" src="{{ asset('img/Logo_THoF.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class=" mt-2" >
        <div class="row text-center">
            <p class="titre">{{ $formulaireSelect->nom_formulaire }}</p>
            <p class="info">{{ $formulaireSelect->description_formulaire }} </p>
            <p> 
                Crée le {{ $formulaireSelect->created_at->format('d/m/Y') }} 
                à {{ $formulaireSelect->created_at->format('H:i') }} par @foreach($auteurFormulaire as $auteur) {{ $auteur->nom }} {{ $auteur->prenom }}@endforeach
            </p>
        </div>
    </div>


    <div class=""> 
        @foreach ($formulaireSelect->parts as $part)
            <div class=" mt-3 creation-form p-5">
                <p class="titre">{{ $part->titre_partie_formulaire }}</h3>
                @foreach ($part->attribut as $attributFormulaire)
                    <div class="form-group mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="label-form">{{ $attributFormulaire->nom_attribut_formulaire }} : </label>
                            </div>
                            <div class="col-md-6">

                                @if ($attributFormulaire->type_attribut_formulaire == 1)
                                    <span  class="form-control form-thof input-span">
                                @elseif ($attributFormulaire->type_attribut_formulaire == 2)
                                    <span  class="form-control form-thof  input-span">
                                @elseif ($attributFormulaire->type_attribut_formulaire == 3)
                                    <span  class="form-control form-thof input-span">

                                @elseif ($attributFormulaire->type_attribut_formulaire == 4)
                                    <span  class="form-control form-thof input-span">

                                @elseif ($attributFormulaire->type_attribut_formulaire == 5)
                                <span  class="form-control form-thof input-span">

                                @elseif ($attributFormulaire->type_attribut_formulaire == 6)
                                <span  class="form-control form-thof input-span">

                                @elseif ($attributFormulaire->type_attribut_formulaire == 7)
                                <span  class="form-control form-thof input-span">

                                @elseif($attributFormulaire->type_attribut_formulaire == 8)
                                    <span class="form-select input-span form-thof mt-2 >
                                        <option value="" selected disabled>Choisir une valeur</option>
                                    </span>
                                @endif                
                            </div>
                        </div>             
                    </div><br><br>
                @endforeach  
            </div>
            
        @endforeach
    </div> <br><br>
    <div class="signature">
        <p class="signature-droite">Différentes signatures :   </p>
    </div>

</body>
</html>