// Récupère le champ nbParts du formulaire qui permet de compter le nombre de partie dont est composé le formulaire
var nbPartsForm = document.getElementById("nbParts");

/**
 * Gère le click dans la page
 * s'il s'agit d'un élément contenant la classe 'btn-parts' alor
 * appelle la fonction openMenu avec en paramètre -1 pour que tout les menus Item de la page passe en caché
 * @param {Event} e L'élément sur lequel on click
 */
document.onclick = function(e){
    if(!e.target.classList.contains("btn-parts")){
        openMenu(-1);
    }
}

/**
 * Permet de rendre visible le menu d'ajout d'une partie passé en paramètre
 * et de rendre caché les autres menus d'ajout
 * @param {int} formParts le numéro de la partie dont il faut ouvrir le menu d'ajout
 */
function openMenu(formParts){

    // Récupère tous les menu d'ajout et les rend caché
        var allMenu = document.getElementsByClassName("menuItem");
        for(i=0; i<allMenu.length; i++){
            if(i != formParts){
                allMenu[i].style.display = "none";
            }
        }
    
    // Récupère le menu d'ajout à rendre visible
        var menu = allMenu[formParts];

    // Si un menu à bien été récupérer alors le cache
        if(menu != null){
            menu.style.display = "block"
        }
          
}

function modifTitrePartie(numParts){
    let champTitrePartie = document.querySelector('[name="titrePartie' + numParts + '"]');
    let titrePartie = document.querySelectorAll('h4')[numParts];
    titrePartie.textContent = 'Partie : ' + champTitrePartie.value;
}

function modifTitreFormulaire(){
    let champTitreFormulaire = document.getElementById('titreFormulaire');
    let titreFormulaire = document.getElementById('creationFormulaire').querySelector('h3');
    titreFormulaire.textContent = "Formulaire : " + champTitreFormulaire.value;
}

/**
 * Permet de créer un menu d'ajout (élément 'ul' HTML) pour une partie
 * @returns un nouveau menu d'ajout
 */
function createMenu(){
    // Crée un nouvel élément de type 'ul' qui sera un nouveau menu d'ajout et lui attribue ses classes
        let newMenu = document.createElement("ul");
        newMenu.className = "mt-2 menuItem";

    // Création du bouton pour ajouter une partie et ajout de celui-ci dans un élément de type 'li'
        let partie = document.createElement("li");
        let buttonPartie = createButton("Ajouter une partie", "button", "btn");
        buttonPartie.addEventListener("click", ajouterPartie);
        partie.appendChild(buttonPartie);

    // Création du bouton pour ajouter un champ de formulaire pour créer un 'input' et l'ajoute dans un élément de type 'li'' au menu'
        let ajoutElement = document.createElement("li");
        let buttonAjoutElement = createButton("Ajouter un champ", "button", "btn");
        buttonAjoutElement.setAttribute("data-parts-button-ajout", nbPartsForm.getAttribute("value"));
        buttonAjoutElement.addEventListener("click", function(e){
            ajouterElement(parseInt(e.target.getAttribute("data-parts-button-ajout")));
        });
        ajoutElement.appendChild(buttonAjoutElement);

    // Création du bouton pour ajouter un champ de formulaire pour créer un 'select' et l'ajoute dans un élément de type 'li'
        let ajoutListeDeroulante = document.createElement("li");
        let buttonAjoutListeDeroulante = createButton("Ajouter une liste déroulante", "button", "btn");
        buttonAjoutListeDeroulante.setAttribute("data-parts-button-delete", nbPartsForm.getAttribute("value"));
        buttonAjoutListeDeroulante.addEventListener("click", function(e){
            ajouterSelect(parseInt(e.target.getAttribute("data-parts-button-delete")));
        });
        ajoutListeDeroulante.appendChild(buttonAjoutListeDeroulante);

    // Ajoute tous les éléments de type 'li' créé précédemment au nouveau menu
        newMenu.appendChild(partie);
        newMenu.appendChild(ajoutElement);
        newMenu.appendChild(ajoutListeDeroulante);

    return newMenu;
}

/**
 * Permet d'ajouter une nouvelle partie au formulaire
 */
function ajouterPartie(){
    // Récupère la div qui contient toutes les parties du formulaire
        var form = document.getElementById("formulaire");

    // Crée le titre qui indique le numéro de la partie
        let titreH4 = document.createElement("h4");
        titreH4.textContent = "Partie n°" + (parseInt(nbPartsForm.getAttribute("value"))+1);
        titreH4.className = "text-center";

    // Crée une nouvelle partie (une div) et lui attribue son id et ses classes
        let newPartie = document.createElement("div");
        newPartie.id = "parts" + nbPartsForm.getAttribute("value");
        newPartie.className = "mb-3 form-parts container mt-5 creation-form p-5 mb-5";
        newPartie.setAttribute("data-aos", "zoom-in");

    // Crée un nouveau input caché pour compter le nombre de champ de la partie et lui ajoute son id, son name et une value de 0
        let newChampCpt = document.createElement("input");
        newChampCpt.type = "hidden";
        newChampCpt.id = "nbChamp" + nbPartsForm.getAttribute("value");
        newChampCpt.name = "nbChamp" + nbPartsForm.getAttribute("value");
        newChampCpt.value = 0;

    
    // Crée un nouveau input de type text qui correspond au titre de la partie avec son label
        let titrePartie = document.createElement("input");
        titrePartie.type = "text";
        titrePartie.placeholder = "Ex : Informations personnelles";
        titrePartie.name = "titrePartie" + nbPartsForm.getAttribute("value");
        titrePartie.className = "form-control form-thof form-width";
        let labelTitrePartie = document.createElement("label");
        labelTitrePartie.textContent = "Titre de la partie";
        labelTitrePartie.className = "label-form";
        titrePartie.addEventListener('keyup', function(e){let numParts = e.srcElement.getAttribute("name").slice(11); modifTitrePartie(numParts);});

    // Crée une div qui contiendra le label et l'input pour saisir le titre d'une partie et insère le label et l'input de la partie
        let divTitrePartie = document.createElement("div");
        divTitrePartie.className = "form-group";
        divTitrePartie.appendChild(labelTitrePartie);
        divTitrePartie.appendChild(titrePartie);

    // Crée le span qui contiendra un éventuel message d'erreur lors de la vérification et l'ajoute à la divTitrePartie
        let spanMessageErrorTitre = document.createElement("span");
        spanMessageErrorTitre.className = "text-danger";
        spanMessageErrorTitre.id = "titrePartieMsgError" + nbPartsForm.getAttribute("value");
        divTitrePartie.appendChild(spanMessageErrorTitre);

    // Crée un nouveau select qui permet de sélectionner qui doit remplir cette partie de formulaire et lui ajoute ses classes
        // let remplirPar = createSelect("remplirParPartie" + nbPartsForm.getAttribute("value"), "Choisir une valeur", true, [
        //     "etudiant",
        //     "prof",
        //     "autre"
        // ]);
        // remplirPar.className = "form-select form-thof form-width";
        // let labelRemplirPar = document.createElement("label");
        // labelRemplirPar.textContent = "Partie remplie par";
        // labelRemplirPar.className = "label-form";

    // Crée une div qui contiendra le label et le select pour saisir qui doit remplir la partie de formulaire et insère le label et le select
        // let divRemplirPar = document.createElement("div");
        // divRemplirPar.className ="form-group mb-5";
        // divRemplirPar.appendChild(labelRemplirPar);
        // divRemplirPar.appendChild(remplirPar);

    // Crée le span qui contiendra un éventuel message d'erreur lors de la vérification du champ "estRemplitPar" et l'ajoute à la divRemplirPar
        // let spanMessageErrorRemplitPar = document.createElement("span");
        // spanMessageErrorRemplitPar.className = "text-danger";
        // spanMessageErrorRemplitPar.id = "remplitParMsgError" + nbPartsForm.getAttribute("value");
        // divRemplirPar.appendChild(spanMessageErrorRemplitPar);

    // Crée un nouveau button qui permet d'ouvrir un menu d'ajout et lui ajoute un attribut pour l'identifier
        let newButtonAjout = createButton("Ajouter", "button", "btn button-green btn-parts");
        newButtonAjout.addEventListener("click", function(e){
            openMenu(e.target.getAttribute("data-button-add-menu"));
        });
        newButtonAjout.setAttribute("data-button-add-menu", nbPartsForm.getAttribute("value"));

    // Crée un nouveau button qui permet de supprimer cette partie et lui ajoute son id
        let newButtonDelete = createButton("Supprimer Partie", "button", "btn button-red btn-parts");
        newButtonDelete.addEventListener("click", function(e){
            supprimerPartie(e.target.getAttribute("data-button-delete-parts"));
        });
        newButtonDelete.setAttribute("data-button-delete-parts", nbPartsForm.getAttribute("value"));

    // Crée un nouveau menu d'ajout
        let newMenu = createMenu();
    
    // Ajoute tous les éléments créés précédemment à la nouvelle partie
        newPartie.appendChild(titreH4);
        newPartie.appendChild(divTitrePartie);
        newPartie.appendChild(newChampCpt);
        // newPartie.appendChild(divRemplirPar);
        newPartie.appendChild(document.createElement("br"));
        newPartie.appendChild(newButtonAjout);
        newPartie.appendChild(newButtonDelete);
        newPartie.appendChild(newMenu);

    // Ajoute la nouvelle partie au formulaire
        form.appendChild(newPartie);

    // Modifie le champ caché qui compte le nombre de partie en lui ajoutant 1
        nbPartsForm.setAttribute("value", parseInt(nbPartsForm.getAttribute("value")) + 1);
}

/**
 * Permet d'ajouter un nouvel élément pour créer un nouveau champ au formualaire
 * @param {int} formParts le numéro de la partie à laquelle on ajoute un nouvel élément
 */
function ajouterElement(formParts){
    // Récupère la partie de formulaire à laquelle il faut rajouter un élément
        var partie = document.getElementsByClassName("form-parts")[formParts];
    // Récupère le champ caché qui compte le nombre d'élément de la partie de formulaire à laquelle on rajoute un nouvel élément
        var nbChampForm = document.getElementById("nbChamp" + formParts);
    // Récupère le numéro du champ
        var numChamp = nbChampForm.getAttribute("value");

    // Crée un nouvel élément (une div) pour créer un nouveau champ au formulaire et lui ajoute ses classes
        let element = document.createElement("div");
        element.setAttribute("data-champ", numChamp);
        element.setAttribute("data-parts", formParts);
        element.className = "mb-3 champForm";

    // Création des div pour contenir le type et le nom du champ
    let divRow1 = document.createElement("div");
    divRow1.className = "row mb-3";
    let divColmd1 = document.createElement("div");
    divColmd1.className = "col-md-6";
    let divColmd2 = document.createElement("div");
    divColmd2.className = "col-md-6";

    // Crée une variable qui contient le name général
        let name = "parts" + formParts + "Champ" + numChamp;

    // Crée un nouveau select qui détermine le type du champ qui sera créer
        let elementType = createSelect(name + "[type]", "Type du champ", true, [
            "texte",
            "date",
            "email",
            "fichier",
            "nombre",
            "téléphone",
            "zone de texte"
        ]);
        elementType.setAttribute("data-parts", formParts);
        elementType.setAttribute("data-champ-select", numChamp);
        let divElementType = document.createElement("div");
        divElementType.className = "form-group";
        divElementType.appendChild(elementType);
        divColmd1.appendChild(divElementType);

    // Ajoute  la balise qui contiendra le potentiel message d'erreur du select de type
        addMessageError(divColmd1, name + "TypeMsgError");
        
    // Détermine ce qu'il faut faire lors du changement d'état du select, permet ainsi de modifier l'élément de création de formulaire
        elementType.addEventListener("change", function(e){
            var elementSelect =  e.target.options[e.target.selectedIndex].value;
            var champ = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-champ="' + e.target.getAttribute("data-champ-select") + '"]');
            changerChamp(elementSelect, champ);
        })

    // Crée un nouvel input qui permet de renseigner le name du nouveau champ du formulaire
        let elementName = createInput(name + "[name]", "Nom du champ de formulaire", "text", true, null);
        elementName.setAttribute("data-name-champ", numChamp);
        let divElementName = document.createElement("div");
        divElementName.className = "form-group";
        divElementName.appendChild(elementName);
        divColmd2.appendChild(divElementName);

    // Ajoute la balise contenant le potentiel message d'erreur de l'input name
        addMessageError(divColmd2, name + "NameMsgError");

    // Ajout des divColmd1 et divColmd2 dans la divRow1
    divRow1.appendChild(divColmd1);
    divRow1.appendChild(divColmd2);
        
    // Création des div pour ajouter le placeholder et le select required
    let divRow2 = document.createElement("div");
    divRow2.className = "row mb-3";
    let divColmd3 = document.createElement("div");
    divColmd3.className = "col-md-6";
    let divColmd4 = document.createElement("div");
    divColmd4.className = "col-md-6";
    
    // Crée un nouvel input qui permet de renseigner le placeholder du nouveau champ du formulaire
        let elementPlaceholder = createInput(name + "[placeholder]", "Exemple du champ de formulaire", "text", true, null);
        elementPlaceholder.setAttribute("data-placeholder-champ", numChamp);
        let divElementPlaceholder = document.createElement("div");
        divElementPlaceholder.className = "form-group";
        divElementPlaceholder.appendChild(elementPlaceholder);
        divColmd3.appendChild(divElementPlaceholder);

    // Ajoute la balise contenant le potentiel message d'erreur à l'input du placeholder
        addMessageError(divColmd3, name + "PlaceholderMsgError");
    
    // Crée un nouveau select qui permet de renseigner si le nouveau champ du formulaire est obligatoire ou non
        let elementRequired = createSelect(name + "[required]", null, true, [
            "obligatoire",
            "non obligatoire"
        ]);
        elementRequired.setAttribute("data-required-champ", numChamp);
        let divElementRequired = document.createElement("div");
        divElementRequired.className = "form-group";
        divElementRequired.appendChild(elementRequired);
        divColmd4.appendChild(divElementRequired);

    // Ajout des divColmd3 et divColmd4 dans la divRow2
        divRow2.appendChild(divColmd3);
        divRow2.appendChild(divColmd4);

    // Crée un button qui permet de supprimer un élément précis
        let divRowButtonDelete = document.createElement("div");
        divRowButtonDelete.className = "row";
        let divColmdButtonDelete = document.createElement("div");
        divColmdButtonDelete.className = "col-md-12 text-center";
        let buttonDelete = createButton("Supprimer", "button", "btn button-red");
        buttonDelete.setAttribute("data-parts", formParts);
        buttonDelete.setAttribute("data-button-delete-champ",numChamp);
        buttonDelete.addEventListener("click", function(e){
            var champ = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-champ="' + e.target.getAttribute("data-button-delete-champ") + '"]');
            supprimerChamp(champ);
        });
        divColmdButtonDelete.appendChild(buttonDelete);
        divRowButtonDelete.appendChild(divColmdButtonDelete);

    // Récupère le button "ajouter" de la partie où l'on ajoute un nouvel élément
        let button = document.getElementsByClassName("form-parts")[formParts].getElementsByClassName("btn-parts")[0];
    
    // Crée une balise p qui contient le numéro du champ pour mieux l'identifier
        let p = document.createElement("p");
        p.setAttribute("data-champ-p", numChamp);
        p.style.fontWeight = "bold";
        p.style.marginBottom = "0px";
        p.textContent ="Champ n°" + (parseInt(numChamp)+1);

    // Crée la div qui contiendra des champs spécifiques en fonction du type de champ
        let divTypeSpecifique = document.createElement("div");
        divTypeSpecifique.className = "mb-3";
        divTypeSpecifique.setAttribute("data-champ-specifique", numChamp);

    // Ajoute tous les input et select créés pour ce nouvel élément
        element.appendChild(p);
        element.appendChild(divRow1);
        element.appendChild(divRow2);
        element.appendChild(divTypeSpecifique);
        element.appendChild(divRowButtonDelete);
    
    // Ajoute le nouvel élément dans la partie juste avant le button récupéré précédemment
    partie.insertBefore(element, button);

    // Modifie l'input caché qui compte le nombre de champ dans la partie
        nbChampForm.setAttribute("value", parseInt(numChamp) + 1);
}

/**
 * Permet d'ajouter un nouveau select pour créer un nouveau champ au formualaire
 * @param {int} formParts le numero de la partie à laquelle on ajoute un nouveau select
 */
function ajouterSelect(formParts){
    // Récupère la partie de formulaire à laquelle il faut rajouter un élément
        var partie = document.getElementsByClassName("form-parts")[formParts];
    // Récupère le champ caché qui compte le nombre d'élément de la partie de formulaire à laquelle on rajoute un nouvel élément
        var nbChampForm = document.getElementById("nbChamp" + formParts);
    // Récupère le numéro du champ
        var numChamp = nbChampForm.getAttribute("value");

    // Crée un nouvel élément (une div) pour créer un nouveau select au formulaire et lui ajoute ses classes
        let element = document.createElement("div");
        element.setAttribute("data-parts", formParts);
        element.setAttribute("data-champ", numChamp);
        element.className = "mb-3 champForm";

    // Création des div pour contenir le type et le nom du champ
        let divRow1 = document.createElement("div");
        divRow1.className = "row mb-3";
        let divColmd1 = document.createElement("div");
        divColmd1.className = "col-md-6";
        let divColmd2 = document.createElement("div");
        divColmd2.className = "col-md-6";

    // crée une variable qui contient le name pour référencer le champ en vue de son traitement
        let nameChamp = "parts" + formParts + "Champ" + numChamp;
    
    // Crée un input caché pour informer qu'il s'agit d'un champ de type select
        let typeChamp = createInput(nameChamp + "[type]", "", "hidden", true, "select");
        typeChamp.setAttribute("data-champ-select", numChamp);

    // Crée un input caché pour compter le nombre d'option du select
        let compteurOption = createInput(nameChamp + "[nbOption]", "", "hidden", false, 0);
        compteurOption.setAttribute("data-cpt-option-champ", numChamp);

    // Crée un nouvel input qui permet de renseigner le name du nouveau select du formulaire
        let elementName = createInput(nameChamp + "[name]", "Identifiant de la liste déroulante", "text", true, null);
        elementName.setAttribute("data-name-champ", numChamp);
        let divName = document.createElement("div");
        divName.className = "form-group";
        divName.appendChild(elementName);
        divColmd1.appendChild(divName);

    // Ajoute la balise contenant le potentiel message d'erreur de l'input qui contient le name
        addMessageError(divColmd1, nameChamp + "NameMsgError");

    // Crée un nouvel input qui permet de renseigner le placeholder du nouveau select du formulaire
        let elementPlaceholder = createInput(nameChamp + "[placeholder]", "Titre de la liste déroulante", "text", true, null);
        elementPlaceholder.setAttribute("data-placeholder-champ", numChamp);
        let divElementPlaceholder = document.createElement("div");
        divElementPlaceholder.className = "form-group";
        divElementPlaceholder.appendChild(elementPlaceholder);
        divColmd2.appendChild(divElementPlaceholder);

    // Ajoute la balise contenant le potentiel message d'erreur de l'input qui contient le placeholder
        addMessageError(divColmd2, nameChamp + "PlaceholderMsgError");

    // Ajoute les divColmd1 et divColmd2 dans le row1
        divRow1.appendChild(divColmd1);
        divRow1.appendChild(divColmd2);

    // Création des div pour ajouter le select required et le select multiple
        let divRow2 = document.createElement("div");
        divRow2.className = "row mb-3";
        let divColmd3 = document.createElement("div");
        divColmd3.className = "col-md-6";
        let divColmd4 = document.createElement("div");
        divColmd4.className = "col-md-6";

    // Crée un nouveau select qui permet de renseigner si le nouveau select du formulaire est obligatoire ou non
        let elementRequired = createSelect(nameChamp + "[required]", null, true, [
            "obligatoire",
            "non obligatoire"
        ]);
        elementRequired.setAttribute("data-required-champ", numChamp);
        let divRequired = document.createElement("div");
        divRequired.className = "form-group";
        divRequired.appendChild(elementRequired);
        divColmd3.appendChild(divRequired);

    // Crée un nouveau select qui permet de savoir si on peut sélectionner plusieurs options ou non du nouveau champ du formulaire
        let elementMultiple = createSelect(nameChamp + "[multiple]", "Est-ce à choix multiple ?", true, [
            "oui",
            "non"
        ]);
        elementMultiple.setAttribute("data-multiple-select", nbChampForm.getAttribute("value"));
        let divElementMultiple = document.createElement("div");
        divElementMultiple.className = "form-group";
        divElementMultiple.appendChild(elementMultiple);
        divColmd4.appendChild(divElementMultiple);

    // Ajoute la balise contenant le potentiel message d'erreur du select
        addMessageError(divColmd4, nameChamp + "MultipleMsgError");

    // Ajoute les divColmd3 et divColmd4 dans le row2
        divRow2.appendChild(divColmd3);
        divRow2.appendChild(divColmd4);

    // Crée un button qui permet d'ajouter une option au nouveau select du formulaire
        let buttonAjoutOption = createButton("Ajouter une Option", "button", "btn button-blue ");
        buttonAjoutOption.setAttribute("data-parts", formParts);
        buttonAjoutOption.setAttribute("data-button-add-option-champ", numChamp);
        buttonAjoutOption.addEventListener("click", function(e){
            var nbOption = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-cpt-option-champ="' + e.target.getAttribute("data-button-add-option-champ") + '"]');
            ajouterOption(nbOption);
        });

    // Crée une div qui contiendra les options ajoutés pour le nouveau select du formulaire
        let divOption = document.createElement("div");
        divOption.setAttribute("data-option-champ", numChamp);
        divOption.className = "d-flex flex-column mb-3";

    // Crée un button qui permet de supprimer un select précis et ses options
        let buttonDelete = createButton("Supprimer", "button", "btn button-red");
        buttonDelete.setAttribute("data-parts", formParts);
        buttonDelete.setAttribute("data-button-delete-champ", numChamp);
        buttonDelete.addEventListener("click", function(e){
            var champ = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-champ="' + e.target.getAttribute("data-button-delete-champ") + '"]');
            var options = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-option-champ="' + e.target.getAttribute("data-button-delete-champ") + '"]')
            options.parentNode.removeChild(options);
            supprimerChamp(champ);
        });

    // Crée une div pour mettre les buttons ajouter et supprimer
        let divButtons = document.createElement("div");
        divButtons.className = "row";
        let divContainsButtons = document.createElement("div");
        divContainsButtons.className = "col-md-12 text-center";
        divContainsButtons.appendChild(buttonAjoutOption);
        divContainsButtons.appendChild(buttonDelete);
        divButtons.appendChild(divContainsButtons);

    // Crée une balise p qui contient le numéro du champ pour mieux l'identifier
        let p = document.createElement("p");
        p.setAttribute("data-champ-p", numChamp);
        p.style.fontWeight = "bold";
        p.style.marginBottom = "0px";
        p.textContent ="Champ n°" + (parseInt(numChamp)+1);

    // Récupère le button "ajouter" de la partie où l'on ajoute un nouvel élément
        let button = document.getElementsByClassName("form-parts")[formParts].getElementsByClassName("btn-parts")[0];

    // Ajoute tous les input et select créés pour ce nouveau select
        element.appendChild(p);
        element.appendChild(typeChamp);
        element.appendChild(compteurOption);
        element.appendChild(divRow1);
        element.appendChild(divRow2);
        element.appendChild(divOption);
        element.appendChild(divButtons);

    // Ajoute le nouveau select et la div contenant ses options dans la partie juste avant le button récupéré précédemment
        partie.insertBefore(element, button);

    // Modifie l'input caché qui compte le nombre de champ dans la partie
        nbChampForm.setAttribute("value", parseInt(nbChampForm.getAttribute("value")) + 1);
}

/**
 * Permet d'ajouter une option dans une div d'option pour un élément select
 * @param {Element} nbOption Le compteur d'option du select
 */
function ajouterOption(nbOption){
    // Crée une nouvelle div contenant les éléments pour créer une option
        let divChampOption = document.createElement("div");
        divChampOption.setAttribute("data-option", nbOption.getAttribute("value"));
        divChampOption.className = "mb-1 col-md-12 text-center row";

    // Crée les div colmd qui contiendront le input et le button
        let divColmd1 = document.createElement("div");
        divColmd1.className = "col-md-9 value-option";
        let divColmd2 = document.createElement("div");
        divColmd2.className = "col-md-3";

    // Récupère la div qui contient les options
        var div = document.querySelector('[id="' + nbOption.parentNode.parentNode.getAttribute("id") + '"] [data-option-champ="' + nbOption.getAttribute("data-cpt-option-champ") +'"]');
    
        
    // Crée un nouvel input qui contient la valeur du de l'option
        let nameChampOption = nbOption.parentNode.parentNode.getAttribute("id") + "select" + div.getAttribute("data-option-champ") + "[]";
        let champOption = createInput(nameChampOption, "Valeur de l'option", "text", true, null);
        champOption.setAttribute("data-name-option-champ", div.getAttribute("data-option-champ"));
        divColmd1.appendChild(champOption);

    // Ajoute la balise contenant le potentiel message d'erreur de l'input de l'option
        addMessageError(divColmd1, "option" + nbOption.getAttribute("value"));

    // Crée un button qui permet de supprimer une option
        let buttonDelete = createButton("Supprimer option", "button", "btn button-red");
        buttonDelete.setAttribute("data-parts", nbOption.parentNode.parentNode.getAttribute("id").slice(5));
        buttonDelete.setAttribute("data-option-champ-button-delete", nbOption.getAttribute("data-cpt-option-champ"));
        buttonDelete.setAttribute("data-button-delete-option", nbOption.getAttribute("value"));
        buttonDelete.addEventListener("click", function(e){
            // Récupère une option
                var divOption = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-option-champ="' + e.target.getAttribute("data-option-champ-button-delete") + '"] [data-option="' + e.target.getAttribute("data-button-delete-option") + '"]');
            // Supprime l'option récupéré
                divOption.parentNode.removeChild(divOption);
            // Récupère toutes les options contenus avec l'option que l'on vient de supprimer
                var allOption = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-option-champ="' + e.target.getAttribute("data-option-champ-button-delete") + '"]');
            
            // Récupère le compteur d'option concerné
                let nbOption = document.querySelector('[id="parts' + e.target.getAttribute("data-parts") + '"] [data-cpt-option-champ="' + e.target.getAttribute("data-option-champ-button-delete") + '"]');

            // Modifie tous les champs suivant le champ supprimés dans le but de les renuméroté correctement
                i = parseInt(e.target.getAttribute("data-button-delete-option")) + 1;
                for(i; i<nbOption.getAttribute("value"); i++){
                    var divOptionModif = allOption.querySelector('[data-option="' + i + '"]');
                    divOptionModif.setAttribute("data-option", i-1);
                    var modifButton = divOptionModif.querySelector('[data-button-delete-option="' + i + '"]');
                    modifButton.setAttribute("data-button-delete-option", i-1);
                    var modifMsgErrorOption = divOptionModif.querySelector('[id="' + "option" + i + '"]');
                    modifMsgErrorOption.setAttribute("id", "option" + (i-1));
                }

            // Modifie le compteur pour qu'il corresponde au nombre total de champ
                nbOption.setAttribute("value", parseInt(nbOption.getAttribute("value")) - 1);
                
        });
        divColmd2.appendChild(buttonDelete);

    // Modifie le nombre d'option du select
        nbOption.setAttribute("value", parseInt(nbOption.getAttribute("value")) + 1);

    // Ajoute les élément pour créer une option dans la div les contenant
        divChampOption.appendChild(divColmd1);
        divChampOption.appendChild(divColmd2);
    
    // Ajoute la div d'option dans la div contenant les options
        div.appendChild(divChampOption);
}

/**
 * 
 * @param {*} elementSelect 
 * @param {*} champ 
 */
function changerChamp(elementSelect, champ){
    let buttonDelete = champ.querySelector('[data-button-delete-champ="' + champ.getAttribute("data-champ") + '"]');
    let divTypeSpecifique = champ.querySelector('[data-champ-specifique]');
    while(divTypeSpecifique.firstChild){
        divTypeSpecifique.removeChild(divTypeSpecifique.firstChild);
    }
    switch (elementSelect) {
        case "nombre":
            let divRow = document.createElement("div");
            divRow.className = "row";
            let divColmd1 = document.createElement("div");
            divColmd1.className = "col-md-6";
            let divColmd2 = document.createElement("div");
            divColmd2.className = "col-md-6";

            let name = "parts" + champ.getAttribute("data-parts") + "Champ" + champ.getAttribute("data-champ");

            let nbMin = createInput(name + "[nombreMin]", "Valeur minimale", "number", true, null);
            nbMin.setAttribute("data-nombre-min", champ.getAttribute("data-champ"));
            let nbMax = createInput(name + "[nombreMax]", "Valeur maximale", "number", true, null);
            nbMax.setAttribute("data-nombre-max", champ.getAttribute("data-champ"));

            divColmd1.appendChild(nbMin);
            divColmd2.appendChild(nbMax);

        // Ajoute les balises qui contiendront les potentiels messages d'erreur
            addMessageError(divColmd1, name + "ValminMsgError");
            addMessageError(divColmd2, name + "ValmaxMsgError");

            divRow.appendChild(divColmd1);
            divRow.appendChild(divColmd2);

            divTypeSpecifique.appendChild(divRow);
        break;

        case "fichier":
            let divFichierAutorise = document.createElement("div");
            divFichierAutorise.setAttribute("data-champ-checkbox", champ.getAttribute("data-champ"));
            divFichierAutorise.className = "row";

            let divLabel = document.createElement("div");
            divLabel.className = "col-md-6";
            let labelDiv = document.createElement("label");
            labelDiv.textContent = "Choisissez le type de fichier possible pour le champ :";
            divLabel.appendChild(labelDiv);

            let fichierAutorise = document.createElement("div");
            fichierAutorise.className = "col-md-6 d-flex justify-content-evenly";
            let nameCheckbox = "parts" + champ.getAttribute("data-parts") + "Champ" + champ.getAttribute("data-champ") + "[typeFichier][]";
            var tableauTypeFichier = ["png", "jpg", "pdf"];
            for(i=0; i<tableauTypeFichier.length; i++){
                let divCheckbox = document.createElement("div");

                let checkbox = createInput(nameCheckbox, null, "radio", false, tableauTypeFichier[i]);
                checkbox.id = tableauTypeFichier[i];
                let label = document.createElement("label");
                label.id = tableauTypeFichier[i];
                label.textContent = tableauTypeFichier[i].toUpperCase();
                
                divCheckbox.appendChild(checkbox);
                divCheckbox.appendChild(label);
                fichierAutorise.appendChild(divCheckbox);
            }

            divFichierAutorise.appendChild(divLabel);
            divFichierAutorise.appendChild(fichierAutorise);
            divTypeSpecifique.appendChild(divFichierAutorise);

        // Ajoute la balise qui contiendra le potentiel message d'erreur
            addMessageError(divFichierAutorise, "parts" + champ.getAttribute("data-parts") + "Champ" + champ.getAttribute("data-champ") + "FichierMsgError");

            champ.insertBefore(divTypeSpecifique, buttonDelete.parentNode.parentNode);
        break;

        case "zone de texte":
            let divTextarea = document.createElement("div");
            divTextarea.className = "row";

            let divColmd3 = document.createElement("div");
            divColmd3.className = "col-md-6";
            let divColmd4 = document.createElement("div");
            divColmd4.className = "col-md-6";

            let nameTextarea = "parts" + champ.getAttribute("data-parts") + "Champ" + champ.getAttribute("data-champ");

            let nombreCharMin = createInput(nameTextarea + "[nombreCharMin]", "Nombre de caractères minimal requis", "number", true, null);
            nombreCharMin.setAttribute("data-nombre-char-min", champ.getAttribute("data-champ"));
            let nombreCharMax = createInput(nameTextarea + "[nombreCharMax]", "Nombre de caractères maximal requis", "number", true, null);
            nombreCharMax.setAttribute("data-nombre-char-max", champ.getAttribute("data-champ"));

            divColmd3.appendChild(nombreCharMin);
            divColmd4.appendChild(nombreCharMax);

        // Ajoute les balises qui contiendront les potentiels messages d'erreur
            addMessageError(divColmd3, nameTextarea + "ValminTextareaMsgError");
            addMessageError(divColmd4, nameTextarea + "ValmaxTextareaMsgError");

            divTextarea.appendChild(divColmd3);
            divTextarea.appendChild(divColmd4);

            divTypeSpecifique.appendChild(divTextarea);

        break;
    
        default:
            break;
    }
}

/**
 * Permet de supprimer un champ particulier
 * @param {Element} champ Le champ à supprimer
 */
function supprimerChamp(champ){

    // Récupère la partie dans laquelle est le champ que l'on veut supprimer
        var partie = document.querySelector('[id="parts' + champ.getAttribute("data-parts") + '"]');
    
    // Récupère le compteur de champ de la partie
        var nbChampForm = partie.querySelector('[id="nbChamp' + partie.id.slice(5) + '"]');
    

    // Supprime le champ de la partie
        partie.removeChild(champ);
    // Récupère toutes les div contenant des champs
        var allChamp = partie.getElementsByClassName("champForm");
    
    // Modifie tous les champs dans le but de les renuméroté correctement
        i = parseInt(champ.getAttribute("data-champ")) + 1;
        let name = "parts" + partie.id.slice(5);
        for(i; i<=allChamp.length; i++){
            let nameChamp = name + "Champ" + (i-1);

            let modifChamp = partie.querySelector('[data-champ="' + i + '"]');
            modifChamp.setAttribute("data-champ", i-1);
            
            let modifButtonDelete = partie.querySelector('[data-button-delete-champ="' + i + '"]');
            modifButtonDelete.setAttribute("data-button-delete-champ", i-1);
            
            let modifDataOptionChamp = partie.querySelectorAll('[data-option-champ="' + i + '"]');
            if(modifDataOptionChamp != null){
                for(j=0; j<modifDataOptionChamp.length; j++){
                    modifDataOptionChamp[j].setAttribute("data-option-champ", i-1);
                }
            }
            let modifDataCptOptionChamp = partie.querySelector('[data-cpt-option-champ="' + i + '"]');
            if(modifDataCptOptionChamp != null){
                modifDataCptOptionChamp.setAttribute("data-cpt-option-champ", i-1);
                modifDataCptOptionChamp.setAttribute("name", nameChamp + "[nbOption]");
            }
            let modifDataButtonAddOptionChamp = partie.querySelector('[data-button-add-option-champ="' + i + '"]');
            if(modifDataButtonAddOptionChamp != null){
                modifDataButtonAddOptionChamp.setAttribute("data-button-add-option-champ", i-1);
            }

            let inputTypeChamp = partie.querySelector('[data-champ-select="' + i + '"]');
            if(inputTypeChamp != null){
                inputTypeChamp.setAttribute("name", nameChamp + "[type]");
                inputTypeChamp.setAttribute("data-champ-select", i-1);
            }
            let inputNameChamp = partie.querySelector('[data-name-champ="' + i + '"]');
            if(inputNameChamp != null){
                inputNameChamp.setAttribute("name", nameChamp + "[name]");
                inputNameChamp.setAttribute("data-name-champ", i-1);
            }
            let placeholderChamp = partie.querySelector('[data-placeholder-champ="' + i + '"]');
            if(placeholderChamp != null){
                placeholderChamp.setAttribute("name", nameChamp + "[placeholder]");
                placeholderChamp.setAttribute("data-placeholder-champ", i-1);
            }
            let requiredChamp = partie.querySelector('[data-required-champ="' + i + '"]');
            if(requiredChamp != null){
                requiredChamp.setAttribute("name", nameChamp + "[required]");
                requiredChamp.setAttribute("data-required-champ", i-1);
            }
            let multipleSelect = partie.querySelector('[data-multiple-select="' + i + '"]');
            if(multipleSelect != null){
                multipleSelect.setAttribute("name", nameChamp + "[multiple]");
                multipleSelect.setAttribute("data-multiple-select", i-1);
            }
            let nameChampOption = partie.querySelector('[data-name-option-champ="' + i + '"]');
            if(nameChampOption != null){
                nameChampOption.setAttribute("name", name + "select" + (i-1) + "[]");
                nameChampOption.setAttribute("data-name-option-champ", i-1);
            }
            let pChamp = partie.querySelector('[data-champ-p="' + i + '"]');
            if(pChamp != null){
                pChamp.setAttribute("data-champ-p", (i-1));
                pChamp.textContent = "Champ n°" + i;
            }
            let allTypeFichierChamp = modifChamp.querySelectorAll('[name="' + name + 'Champ' + i + '[typeFichier][]"]');
            if(allTypeFichierChamp != null){
                for(j=0; j<allTypeFichierChamp.length; j++){
                    allTypeFichierChamp[j].setAttribute("name", nameChamp + "[typeFichier][]");
                }
            }
            let nombreMin = modifChamp.querySelector('[data-nombre-min="' + i + '"]');
            if(nombreMin != null){
                nombreMin.setAttribute("data-nombre-min", (i-1));
                nombreMin.setAttribute("name", nameChamp + "[nombreMin]");
            }
            let nombreMax = modifChamp.querySelector('[data-nombre-max="' + i + '"]');
            if(nombreMax != null){
                nombreMax.setAttribute("data-nombre-max", (i-1));
                nombreMax.setAttribute("name", nameChamp + "[nombreMax]");
            }
            let nombreCharMin = modifChamp.querySelector('[data-nombre-char-min="' + i + '"]');
            if(nombreCharMin != null){
                nombreCharMin.setAttribute("data-nombre-char-min", (i-1));
                nombreCharMin.setAttribute("name", nameChamp + "[nombreCharMin]");
            }
            let nombreCharMax = modifChamp.querySelector('[data-nombre-char-max="' + i + '"]');
            if(nombreCharMax != null){
                nombreCharMax.setAttribute("data-nombre-char-max", (i-1));
                nombreCharMax.setAttribute("name", nameChamp + "[nombreCharMax]");
            }
            let msgErrorType = modifChamp.querySelector('[id="' + name + "Champ" + i + "TypeMsgError" + '"]');
            if(msgErrorType != null){
                msgErrorType.setAttribute("id", nameChamp + "TypeMsgError");
            }
            let msgErrorName = modifChamp.querySelector('[id="' + name + "Champ" + i + "NameMsgError" + '"]');
            if(msgErrorName != null){
                msgErrorName.setAttribute("id", nameChamp + "NameMsgError");
            }
            let msgErrorPlaceholder = modifChamp.querySelector('[id="' + name + "Champ" + i + "PlaceholderMsgError" + '"]');
            if(msgErrorPlaceholder != null){
                msgErrorPlaceholder.setAttribute("id", nameChamp + "PlaceholderMsgError");
            }
            let msgErrorMultiple = modifChamp.querySelector('[id="' + name + "Champ" + i + "MultipleMsgError" + '"]');
            if(msgErrorMultiple != null){
                msgErrorMultiple.setAttribute("id", nameChamp + "MultipleMsgError");
            }
            let msgErrorValmin = modifChamp.querySelector('[id="' + name + "Champ" + i + "ValminMsgError" + '"]');
            if(msgErrorValmin != null){
                msgErrorValmin.setAttribute("id", nameChamp + "ValminMsgError");
            }
            let msgErrorValmax = modifChamp.querySelector('[id="' + name + "Champ" + i + "ValmaxMsgError" + '"]');
            if(msgErrorValmax != null){
                msgErrorValmax.setAttribute("id", nameChamp + "ValmaxMsgError");
            }
            let msgErrorFichier = modifChamp.querySelector('[id="' + name + "Champ" + i + "FichierMsgError" + '"]');
            if(msgErrorFichier != null){
                msgErrorFichier.setAttribute("id", nameChamp + "FichierMsgError");
            }
            let msgErrorValminTextarea = modifChamp.querySelector('[id="' + name + "Champ" + i + "ValminTextareaMsgError" + '"]');
            if(msgErrorValminTextarea != null){
                msgErrorValminTextarea.setAttribute("id", nameChamp + "ValminTextareaMsgError");
            }
            let msgErrorValmaxTextarea = modifChamp.querySelector('[id="' + name + "Champ" + i + "ValmaxTextareaMsgError" + '"]');
            if(msgErrorValmaxTextarea != null){
                msgErrorValmaxTextarea.setAttribute("id", nameChamp + "ValmaxTextareaMsgError");
            }
        }
    
    // Modifie le compteur pour qu'il corresponde au nombre total de champ
        nbChampForm.setAttribute("value", (parseInt(nbChampForm.getAttribute("value")) - 1));
}

/**
 * Permet de supprimer une partie du formulaire
 * @param {int} idParts L'id de la partie à supprimer
 */
function supprimerPartie(idParts){

    // Si le numéro de la partie est égale à 1 ou 0 retourne pour ne rien faire car un formulaire doit contenir au moins une partie
        if(nbPartsForm.getAttribute("value") == 1 || nbPartsForm.getAttribute("value") == 0){
            return;
        }

    // Récupère toutes les parties
        var allParts = document.getElementsByClassName("form-parts");
    // Récupère la partie que l'on souhaite supprimer et la supprime
        var partie = document.getElementById("parts" + idParts);
        partie.parentNode.removeChild(partie);

    // Modifie toutes les parties dans le but de les renuméroter correctement
        i = parseInt(idParts) + 1;
        for(i; i<= allParts.length; i++){
            let modifParts = document.getElementById("parts" + i);
            let modifTitre = modifParts.querySelector('h4');
            let modifPlaceholderTitre = modifParts.querySelector('[name="titrePartie' + i + '"]');
            let modifChampCache = modifParts.querySelector('[id="nbChamp' + i + '"]');
            let modifButtonAdd = document.querySelector('[data-button-add-menu="' + i + '"]');
            let modifButtonDelete = document.querySelector('[data-button-delete-parts="' + i + '"]');
            let buttonAjoutElement = modifParts.querySelector('[data-parts-button-ajout="' + i + '"]');
            let buttonAjoutListeDeroulante = modifParts.querySelector('[data-parts-button-delete="' + i + '"]');
            let spanMessageErrorTitre = modifParts.querySelector('[id="titrePartieMsgError' + i + '"]');
            let spanMessageErrorRemplitPar = modifParts.querySelector('[id="remplitParMsgError' + i +'"]');
            
            allChamp = modifParts.getElementsByClassName("champForm");
            let name = "parts" + (i-1);
            for(j=0; j<allChamp.length; j++){
                let nameChamp = name + "Champ" + j;
                let champ = modifParts.querySelector('[data-champ="' + j + '"]');
                if(champ != null){
                    champ.setAttribute("data-parts", (i-1));
                }
                let inputTypeChamp = modifParts.querySelector('[data-champ-select="' + j + '"]');
                if(inputTypeChamp != null){
                    inputTypeChamp.setAttribute("data-parts", i-1);
                    inputTypeChamp.setAttribute("name", nameChamp + "[type]");
                }
                let inputNameChamp = modifParts.querySelector('[data-name-champ="' + j + '"]');
                if(inputNameChamp != null){
                    inputNameChamp.setAttribute("name", nameChamp + "[name]");
                }
                let placeholderChamp = modifParts.querySelector('[data-placeholder-champ="' + j + '"]');
                if(placeholderChamp != null){
                    placeholderChamp.setAttribute("name", nameChamp + "[placeholder]");
                }
                let requiredChamp = modifParts.querySelector('[data-required-champ="' + j + '"]');
                if(requiredChamp != null){
                    requiredChamp.setAttribute("name", nameChamp + "[required]");
                } 
                let multipleSelect = modifParts.querySelector('[data-multiple-select="' + j + '"]');
                if(multipleSelect != null){
                    multipleSelect.setAttribute("name", nameChamp + "[multiple]");
                }
                let nameChampOption = modifParts.querySelector('[data-name-option-champ="' + j + '"]');
                if(nameChampOption != null){
                    nameChampOption.setAttribute("name", name + "select" + j + "[]");
                }
                let cptOptionChamp = modifParts.querySelector('[data-cpt-option-champ="' + j + '"]');
                if(cptOptionChamp != null){
                    cptOptionChamp.setAttribute("name", nameChamp + "[nbOption]");
                }
                let buttonAjoutOption = modifParts.querySelector('[data-button-add-option-champ="' + j + '"]');
                if(buttonAjoutOption != null){
                    buttonAjoutOption.setAttribute("data-parts", (i-1));
                }
                let buttonDeleteOption = modifParts.querySelectorAll('[data-option-champ-button-delete="' + j + '"]');
                if(buttonDeleteOption != null && cptOptionChamp != null){
                    for(k=0; k<cptOptionChamp.getAttribute("value"); k++){
                        buttonDeleteOption[k].setAttribute("data-parts", (i-1));
                    }
                }
                let buttonDeleteChamp = modifParts.querySelector('[data-button-delete-champ="' + j + '"]');
                if(buttonDeleteChamp != null){
                    buttonDeleteChamp.setAttribute("data-parts", (i-1));
                }
                let allTypeFichierChamp = modifParts.querySelectorAll('[name="' + "parts" + i + 'Champ' + j + '[typeFichier][]"]');
                if(allTypeFichierChamp != null){
                    for(k=0; k<allTypeFichierChamp.length; k++){
                        allTypeFichierChamp[k].setAttribute("name", nameChamp + "[typeFichier][]");
                    }
                }
                let nombreMin = modifParts.querySelector('[data-nombre-min="' + j + '"]');
                if(nombreMin != null){
                    nombreMin.setAttribute("name", nameChamp + "[nombreMin]");
                }
                let nombreMax = modifParts.querySelector('[data-nombre-max="' + j + '"]');
                if(nombreMax != null){
                    nombreMax.setAttribute("name", nameChamp + "[nombreMax]");
                }
                let nombreCharMin = modifParts.querySelector('[data-nombre-char-min="' + j + '"]');
                if(nombreCharMin != null){
                    nombreCharMin.setAttribute("name", nameChamp + "[nombreCharMin]");
                }
                let nombreCharMax = modifParts.querySelector('[data-nombre-char-max="' + j + '"]');
                if(nombreCharMax != null){
                    nombreCharMax.setAttribute("name", nameChamp + "[nombreCharMax]");
                }
                let msgErrorType = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "TypeMsgError" + '"]');
                if(msgErrorType != null){
                    msgErrorType.setAttribute("id", nameChamp + "TypeMsgError");
                }
                let msgErrorName = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "NameMsgError" + '"]');
                if(msgErrorName != null){
                    msgErrorName.setAttribute("id", nameChamp + "NameMsgError");
                }
                let msgErrorPlaceholder = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "PlaceholderMsgError" + '"]');
                if(msgErrorPlaceholder != null){
                    msgErrorPlaceholder.setAttribute("id", nameChamp + "PlaceholderMsgError");
                }
                let msgErrorMultiple = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "MultipleMsgError" + '"]');
                if(msgErrorMultiple != null){
                    msgErrorMultiple.setAttribute("id", nameChamp + "MultipleMsgError");
                }
                let msgErrorValmin = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "ValminMsgError" + '"]');
                if(msgErrorValmin != null){
                    msgErrorValmin.setAttribute("id", nameChamp + "ValminMsgError");
                }
                let msgErrorValmax = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "ValmaxMsgError" + '"]');
                if(msgErrorValmax != null){
                    msgErrorValmax.setAttribute("id", nameChamp + "ValmaxMsgError");
                }
                let msgErrorFichier = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "FichierMsgError" + '"]');
                if(msgErrorFichier != null){
                    msgErrorFichier.setAttribute("id", nameChamp + "FichierMsgError");
                }
                let msgErrorValminTextarea = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "ValminTextareaMsgError" + '"]');
                if(msgErrorValminTextarea != null){
                    msgErrorValminTextarea.setAttribute("id", nameChamp + "ValminTextareaMsgError");
                }
                let msgErrorValmaxTextarea = modifParts.querySelector('[id="' + "parts" + i + "Champ" + j + "ValmaxTextareaMsgError" + '"]');
                if(msgErrorValmaxTextarea != null){
                    msgErrorValmaxTextarea.setAttribute("id", nameChamp + "ValmaxTextareaMsgError");
                }
            }
            
            modifParts.id = "parts" + (i-1);
            modifTitre.textContent = "Partie n°" + i;
            modifPlaceholderTitre.setAttribute("name", "titrePartie" + (i-1));
            modifChampCache.id = "nbChamp" + (i-1);
            modifChampCache.setAttribute("name", "nbChamp" + (i-1));
            modifButtonAdd.setAttribute("data-button-add-menu", i-1);
            modifButtonDelete.setAttribute("data-button-delete-parts", i-1);
            buttonAjoutElement.setAttribute("data-parts-button-ajout", i-1);
            buttonAjoutListeDeroulante.setAttribute("data-parts-button-delete", i-1);
            spanMessageErrorTitre.id = "titrePartieMsgError" + (i-1);
            spanMessageErrorRemplitPar.id = "remplitParMsgError" + (i-1);
        }

    // Modifie le compteur pour qu'il corresponde au nombre total de partie
        nbPartsForm.setAttribute("value", (parseInt(nbPartsForm.getAttribute("value")) - 1));
}