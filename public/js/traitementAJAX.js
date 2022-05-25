$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#creationFormulaire').on('submit',function(e){
    
    e.preventDefault();
    var i=0; 

    var formData = new FormData(this); 
    var nbParts = $('input[name=nbParts]').val(); 

    var titrePartie = []; 
    
    for(i=0; i<nbParts; i++){
        titrePartie[i] = $('input[name=titrePartie'+i+']').val(); 
    }


    var titrePartieMsgError = new Array(); 
    for(i=0; i<nbParts; i++){
        titrePartieMsgError.i= document.getElementById("titrePartieMsgError"+i); 
    }

    var titreMsgError = document.getElementById("titreMsgError"); 
    var descriptionMsgError = document.getElementById("descriptionMsgError"); 

    var titreFormulaire = $('#titreFormulaire').val();
    var description = $('textarea[name=description]').val();

    for(var i=0; i<nbParts; i++){
        var nbChamps = $('input[name=nbChamp'+i+']').val(); 
        for(var j=0; j<nbChamps; j++){
            window['parts'+i+'Champ'+j+'[type]'] = $("select[name='parts"+i+"Champ"+j+"[type]'] option:selected").val();
            window['parts'+i+'Champ'+j+'[name]'] = $("input[name='parts"+i+"Champ"+j+"[name]']").val();
        }
    }

    
    $.ajax({
        url: 'store',
        type: 'POST',
        data:formData,
        contentType: false,
        processData: false,
        success:function(response){
            // $('#successMsg').show();
            window.location.href = '/~hadi0005/thof/public/form/my-form'; 
            // if(titreMsgError != null || descriptionMsgError != null){
            //     titreMsgError.style.display="none"; 
            //     descriptionMsgError.style.display="none"; 
            //     for(i=0; i<nbParts; i++){
            //         titrePartieMsgError.i.style.display="none"; 
            //         var nbChamps = $('input[name=nbChamp'+i+']').val(); 
            //         for(var j=0; j<nbChamps; j++){
            //             var typeMsgError = document.getElementById("parts"+i+"Champ"+j+"TypeMsgError"); 
            //             typeMsgError.style.display="none"; 
            //             var nameMsgError = document.getElementById("parts"+i+"Champ"+j+"NameMsgError");
            //             nameMsgError.style.display="none"; 
            //         }
            //     }
            // }
        },
        error:function(response) {
            console.log(response);
            // Titre
            var retourErrorTitreFormulaire = response.responseJSON.errors.titreFormulaire; 
            if(retourErrorTitreFormulaire == undefined){
                    titreMsgError.style.display="none";
            }else{
                $('#titreMsgError').text(response.responseJSON.errors.titreFormulaire);
            }


            // Description
            var retourErrorDescriptionFormulaire = response.responseJSON.errors.description; 
            if(retourErrorDescriptionFormulaire == undefined){
                descriptionMsgError.style.display="none"; 
            }else {
                $('#descriptionMsgError').text(response.responseJSON.errors.description);
            }

            // // Rempli par ...
            var retourErrorRempliPar = response.responseJSON.errors['formulaire_rempli_par']; 
            if(retourErrorRempliPar == undefined){
                document.getElementById("formulaireRempliParMsgError").style.display="none"; 
            }else{  
                $('#formulaireRempliParMsgError').text(response.responseJSON.errors['formulaire_rempli_par'][0]);
            }

            // TitrePartie
            for(var i=0; i<nbParts; i++){
                var retourErrorTitrePartie = response.responseJSON.errors['titrePartie'+i]; 
                if(retourErrorTitrePartie == undefined){
                    titrePartieMsgError.i.style.display="none"; 
                }else{
                    $('#titrePartieMsgError'+i).text(response.responseJSON.errors['titrePartie'+i][0]);
                }



                var nbChamps = $('input[name=nbChamp'+i+']').val(); 

                // Champ de saisi
                for(var j=0; j<nbChamps ; j++){
                    var typeChamp = $("select[name='parts"+i+"Champ"+j+"[type]'] option:selected").val(); 
                    if(typeChamp != undefined){
                        // Type du champ 
                        var retourErrorTypeChamp = response.responseJSON.errors['parts'+i+'Champ'+j+'[type]']; 
                        if(retourErrorTypeChamp == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"TypeMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'TypeMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'[type]'][0]); 
                        }
                    }

                    // Nom du champ
                    var retourErrorNameChamp = response.responseJSON.errors['parts'+i+'Champ'+j+'.name'];
                    if(retourErrorNameChamp == undefined){
                        document.getElementById("parts"+i+"Champ"+j+"NameMsgError").style.display="none"; 
                    }else{
                        $('#parts'+i+'Champ'+j+'NameMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.name'][0]); 
                    }

                    // Placeholder
                    var retourErrorPlaceholder = response.responseJSON.errors['parts'+i+'Champ'+j+'.placeholder']; 
                    if(retourErrorPlaceholder == undefined){
                        document.getElementById("parts"+i+"Champ"+j+"PlaceholderMsgError").style.display="none"; 
                    }else{
                        $('#parts'+i+'Champ'+j+'PlaceholderMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.placeholder'][0]); 
                    }

                    // Type du fichier si le type du champ == fichier
                    if(typeChamp == "fichier"){
                        var retourErrorTypeFichier = response.responseJSON.errors['parts'+i+'Champ'+j+'.typeFichier']; 
                        if(retourErrorTypeFichier == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"FichierMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'FichierMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.typeFichier'][0]); 
                        }    
                    }

                    // Si le champ est un nombre
                    if(typeChamp == "nombre"){
                        // Nombre min si le type du champ == nombre
                        var retourErrorNombreMin = response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreMin']; 
                        if(retourErrorNombreMin == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"ValminMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'ValminMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreMin'][0]); 
                        }

                        // Nombre max si le type du champ == nombre
                        var retourErrorNombreMax = response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreMax']; 
                        if(retourErrorNombreMax == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"ValmaxMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'ValmaxMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreMax'][0]); 
                        }
                    }

                    // Si le champ est une zone de texte
                    if(typeChamp == "zone de texte"){
                        // Nombre min de caractère du champ
                        var retourErrorNombreCharMin = response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreCharMin']; 
                        if(retourErrorNombreCharMin == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"ValminTextareaMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'ValminTextareaMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreCharMin'][0]); 
                        }

                        // Nombre max de caractère du champ
                        var retourErrorNombreCharMax = response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreCharMax']; 
                        if(retourErrorNombreCharMax == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"ValmaxTextareaMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'ValmaxTextareaMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'.nombreCharMax'][0]); 
                        }
                    }

                    // Type du champ multiple
                    var retourErrorTypeChamp = response.responseJSON.errors['parts'+i+'Champ'+j+'[multiple]']; 
                    var champMultiple = $("select[name='parts"+i+"Champ"+j+"[multiple]']").val();

                    if(champMultiple != undefined){
                        if(retourErrorTypeChamp == undefined){
                            document.getElementById("parts"+i+"Champ"+j+"MultipleMsgError").style.display="none"; 
                        }else{
                            $('#parts'+i+'Champ'+j+'MultipleMsgError').text(response.responseJSON.errors['parts'+i+'Champ'+j+'[multiple]'][0]); 
                        }
                    }
                }
            } 
            
            // Permet d'afficher les erreurs si le formulaire est bon, mais qu'il refait une erreur
                // titreMsgError.style.display="block";
                // descriptionMsgError.style.display="block"; 

                // for(i=0; i<nbParts; i++){
                //     msg = titrePartieMsgError.i; 
                //     msg.style.display="block"; 
                // }
        },
    });
});