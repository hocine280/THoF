<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur\User;
use Illuminate\Http\JsonResponse;
use App\Models\Demande\PieceJointe;
use Illuminate\Support\Facades\Auth;
use App\Models\Formulaire\Formulaire;
use App\Http\Requests\FormulaireRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Validation\Rule;
use App\Http\Controllers\DemandeController;
use App\Models\Formulaire\PartieFormulaire;
use App\Models\Formulaire\AttributFormulaire;
use App\Models\Formulaire\OptionsAttributFormulaire;

class FormulaireController extends Controller
{
    /**
     * Retoune la vue formulaire.list-all, qui permet de visualiser tous les formulaires créer
     */
    public function index()
    {
        $formulaire = Formulaire::orderBy('created_at', 'DESC')->paginate(10);
        return view('formulaire.list-all', [
            'formulaire'=>$formulaire, 
        ]); 
    }

    /**
     * Permet la recherche dynamique sur la vue formulaire.list-all
     */
    public function search(Request $request): JsonResponse{
        $q = $request->q; 
        $formulaire = Formulaire::where('nom_formulaire', 'like', '%' . $q . '%')->get(); 
        return response()->json([
            'formulaire' => $formulaire
        ]); 
    }

    /**
     * Retourne la vue formulaire.my-list, qui permet de visualiser l'ensemble des formulaires que l'on a créé
     */
    public function myForm(){
        $user_id = Auth::id(); 
        $formulaire = Formulaire::where('user_id', '=', $user_id)->orderBy('created_at', 'ASC')->paginate(10); 
        return view('formulaire.my-list', [
            'formulaire'=>$formulaire, 
        ]); 
    }

    /**
     * Retourne la vue formulaire.create, qui permet de créer un formulaire dynamiquement
     */
    public function create()
    {
        return view('formulaire.create'); 
    }

    /**
     * Permet la vérification ainsi que l'enregistremenet en base de données d'un formulaire
     * @param Request $request
     */
    public function store(Request $request)
    {
        /********************************************************
         * Vérification des données saisie par l'utilisateur
         ********************************************************/
            // Nombre de partie du formulaire
            $nbParts = $request->nbParts; 

            /****************************************************************************************************************/
                // Régle de vérification du formulaire
                $rules=[
                    'titreFormulaire' => 'required | max : 255', 
                    'description' => 'required | max : 255',
                    'formulaire_rempli_par' => 'required', 
                ]; 
                // Message en cas d'erreur
                $messageError=[
                    'titreFormulaire.required'=>'Ce champ doit être rempli', 
                    'titreFormulaire.max' => 'Le longueur du titre du formulaire ne doit pas dépasser 255 caractères', 
                    'description.required'=>'Ce champ doit être rempli', 
                    'description.max' => 'Le longueur du titre du formulaire ne doit pas dépasser 255 caractères', 
                    'formulaire_rempli_par.required'=>'Vous devez sélectionner un élement', 
                ]; 

            /****************************************************************************************************************/

            /****************************************************************************************************************/
                // Ajout des règle et du message d'erreur pour le titre de la partie
                for($i=0; $i<$nbParts; $i++){
                    $rules['titrePartie'.$i]='required | max : 255'; 
                    $messageError['titrePartie'.$i.'.required'] = 'Le champ du titre de cette partie est obligatoire'; 
                    $messageError['titrePartie'.$i.'.max'] = 'Le champ du titre de cette partie ne doit pas dépasser 10 caractères'; 

                }
            /****************************************************************************************************************/

            /****************************************************************************************************************/
            // Ajout des règle et du message d'erreur si l'utilisateur décide d'ajouter un champ ou une liste déroulante
            for($z=0; $z<$nbParts; $z++){
                $nbChamp = "nbChamp".$z; 
                $$nbChamp = $request->$nbChamp;

                for($y=0; $y<$$nbChamp; $y++){ 
                    $champIsset = $_POST['parts'.$z.'Champ'.$y]; 

                    if(isset($champIsset) == true){
                        $typeChamp = $_POST['parts'.$z.'Champ'.$y.'']["type"]; 
                        
                        // Type du champ
                        if(($typeChamp == "disabled")){
                            $rules['parts'.$z.'Champ'.$y.'[type]']  = 'required';      
                            $messageError['parts'.$z.'Champ'.$y.'[type].required'] = "Il faut sélectionner un type pour votre champ"; 
                        }
                        
                        // Nom du champ
                        $rules['parts'.$z.'Champ'.$y.'.name']  = 'required | max : 255';
                        $messageError['parts'.$z.'Champ'.$y.'.name.required'] = "Le nom du champ de votre formulaire est obligatoire";
                        $messageError['parts'.$z.'Champ'.$y.'.name.max'] = "Le nom du champ de votre formulaire ne doit pas dépasser 10 caractères";

                        // Placeholder
                        $rules['parts'.$z.'Champ'.$y.'.placeholder']  = 'required | max : 255';
                        $messageError['parts'.$z.'Champ'.$y.'.placeholder.required'] = "L'exemple du champ de votre formulaire est obligatoire";
                        $messageError['parts'.$z.'Champ'.$y.'.placeholder.max'] = "L'exemple du champ de votre formulaire ne doit pas dépasser 10 caractères";

                        // Si le champ est un fichier
                        if($typeChamp == "fichier"){
                            $rules['parts'.$z.'Champ'.$y.'.typeFichier']  = 'required';
                            $messageError['parts'.$z.'Champ'.$y.'.typeFichier.required'] = "Veuillez sélectionner au moins un type de fichier";
                        }

                        // Si le champ est un nombre
                        if($typeChamp == "nombre"){
                            // Nombre minimum 
                            $rules['parts'.$z.'Champ'.$y.'.nombreMin']  = 'required | max : 255';
                            $messageError['parts'.$z.'Champ'.$y.'.nombreMin.required'] = "Veuillez sélectionner le minimum du nombre qui sera saisi par l'utilisateur";
                            $messageError['parts'.$z.'Champ'.$y.'.nombreMin.max'] = "Le nombre minimum ne peut pas dépasser 255 caractères";
                            // Nombre maximum 
                            $rules['parts'.$z.'Champ'.$y.'.nombreMax']  = 'required | max : 255';
                            $messageError['parts'.$z.'Champ'.$y.'.nombreMax.required'] = "Veuillez sélectionner le maximum du nombre qui sera saisi par l'utilisateur";
                            $messageError['parts'.$z.'Champ'.$y.'.nombreMax.max'] = "Le nombre maximum ne peut pas dépasser 255 caractères";
                        }

                        // Si le champ est une zone de texte (textarea)
                        if($typeChamp == "zone de texte"){
                            // Nombre minimum 
                            $rules['parts'.$z.'Champ'.$y.'.nombreCharMin']  = 'required | max : 255';
                            $messageError['parts'.$z.'Champ'.$y.'.nombreCharMin.required'] = "Veuillez sélectionner le nombre minimum de caractère qui sera saisi par l'utilisateur";
                            $messageError['parts'.$z.'Champ'.$y.'.nombreCharMin.max'] = "Le nombre minimum de caractère ne peut pas dépasser 255 caractères";
                            // Nombre maximum 
                            $rules['parts'.$z.'Champ'.$y.'.nombreCharMax']  = 'required | max : 255';
                            $messageError['parts'.$z.'Champ'.$y.'.nombreCharMax.required'] = "Veuillez sélectionner le nombre maximum du caractère qui sera saisi par l'utilisateur";
                            $messageError['parts'.$z.'Champ'.$y.'.nombreCharMax.max'] = "Le nombre maximum de caractère ne peut pas dépasser 255 caractères";
                        }

                        if((isset($_POST['parts'.$z.'Champ'.$y.'']["multiple"]) == true)&&($_POST['parts'.$z.'Champ'.$y.'']["multiple"] == "disabled")){
                            $rules['parts'.$z.'Champ'.$y.'[multiple]']  = 'required';      
                            $messageError['parts'.$z.'Champ'.$y.'[multiple].required'] = "Cette section est obligatoire"; 
                        }
                    }
                }  
            }
        /****************************************************************************************************************/
        $request->validate($rules, $messageError); 
        /****************************************************************************************************************/

        /********************************************************
         * Enregistrement en base de données du formulaire
         ********************************************************/
        $formulaire = new Formulaire(); 
        $formulaire->nom_formulaire = $request->titreFormulaire;
        $formulaire->description_formulaire = $request->description;
        $formulaire->role_id = $request->formulaire_rempli_par;
        $formulaire->user_id = Auth::id();
        $formulaire->method_formulaire = "POST"; 
        $formulaire->target_formulaire = "none"; 
        $formulaire->action_formulaire = "route('trouver une route')"; 
        $formulaire->save(); 

        for($i=0; $i<$nbParts; $i++){
            $partieFormulaire = new PartieFormulaire(); 
            $partieFormulaire->titre_partie_formulaire = $_POST['titrePartie'.$i];
            $partieFormulaire->formulaire_id = $formulaire->id;  
            $partieFormulaire->save(); 

            $nbChamp = "nbChamp".$i; 
            $$nbChamp = $request->$nbChamp;

            for($j=0; $j<$$nbChamp; $j++){
                $attributFormulaire = new AttributFormulaire();
                // Nom de l'attribut
                $attributFormulaire->nom_attribut_formulaire = $_POST['parts'.$i.'Champ'.$j]['name']; 

                // Est-il obligatoire ? 
                if($_POST['parts'.$i.'Champ'.$j]['required'] == "obligatoire"){
                    $attributFormulaire->require_attribut_formulaire = true; 
                }else{
                    $attributFormulaire->require_attribut_formulaire = false; 
                }

                // Placeholder attribut
                $attributFormulaire->placeholder_attribut_formulaire = $_POST['parts'.$i.'Champ'.$j]['placeholder'];

                // Valeur attribut
                $attributFormulaire->value_attribut_formulaire = "None"; 

                // Type de l'attribut
                if(isset($_POST['parts'.$i.'Champ'.$j]['type']) == true){
                    if($_POST['parts'.$i.'Champ'.$j]['type'] == "texte"){
                        $attributFormulaire->type_attribut_formulaire = 1; 
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "date"){
                        $attributFormulaire->type_attribut_formulaire = 2; 
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "email"){
                        $attributFormulaire->type_attribut_formulaire = 3; 
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "fichier"){
                        $attributFormulaire->type_attribut_formulaire = 4; 
                        if($_POST['parts'.$i.'Champ'.$j]['typeFichier'][0] == "png"){
                            $attributFormulaire->type_fichier_id = 1; 
                        }else if($_POST['parts'.$i.'Champ'.$j]['typeFichier'][0] == "jpg"){
                            $attributFormulaire->type_fichier_id = 2; 
                        }else if($_POST['parts'.$i.'Champ'.$j]['typeFichier'][0] == "pdf"){
                            $attributFormulaire->type_fichier_id = 3; 
                        }
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "nombre"){
                        $attributFormulaire->type_attribut_formulaire = 5; 
                        $attributFormulaire->nombre_min = $_POST['parts'.$i.'Champ'.$j]['nombreMin'];
                        $attributFormulaire->nombre_max = $_POST['parts'.$i.'Champ'.$j]['nombreMax'];
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "téléphone"){
                        $attributFormulaire->type_attribut_formulaire = 6; 
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "zone de texte"){
                        $attributFormulaire->type_attribut_formulaire = 7;    
                        $attributFormulaire->nombre_min = $_POST['parts'.$i.'Champ'.$j]['nombreCharMin'];
                        $attributFormulaire->nombre_max = $_POST['parts'.$i.'Champ'.$j]['nombreCharMax'];                      
                    }else if($_POST['parts'.$i.'Champ'.$j]['type'] == "select"){
                        $attributFormulaire->type_attribut_formulaire = 8;    
                    }
                }

                if(isset($_POST['parts'.$i.'Champ'.$j]['multiple'])==false){
                    $attributFormulaire->liste_deroulante = false; 
                }else{
                    $attributFormulaire->liste_deroulante = true; 
                }

                $attributFormulaire->partie_formulaire_id = $partieFormulaire->id; 
                $attributFormulaire->save();
                

                // Liste déroulante ou pas ? 
                if(isset($_POST['parts'.$i.'Champ'.$j]['multiple'])){
                    $attributFormulaire->liste_dseroulante = true; 
                    $nbOption = count($_POST['parts'.$i.'select'.$j]); 
                    for($k=0; $k<$nbOption; $k++){
                        $optionAttribut = new OptionsAttributFormulaire(); 
                        $optionAttribut->value_options_attribut_formulaire = $_POST['parts'.$i.'select'.$j][$k]; 
                        $optionAttribut->attribut_formulaires_id = $attributFormulaire->id; 
                        $optionAttribut->save(); 
                    }
                }   
            }
        }
    }

    /**
     * Retourne la vue formulaire.show, permet de visualiser un formulaire
     * @param int $id
     */
    public function show($id)
    {
        $formulaireSelect = Formulaire::findOrFail($id); 
        $optionAttribut = OptionsAttributFormulaire::all(); 
        return view('formulaire.show', [
            'formulaireSelect' => $formulaireSelect, 
            'optionAttribut' => $optionAttribut, 
        ]); 

    }
    
    /**
     * Permet de supprimer un formulaire
     * @param  int  $id
     */
    public function destroy($id)
    {
        $formulaire = Formulaire::findOrFail($id); 
        $formulaire->delete(); 
        return Redirect::route('form.my-list')->with('success', 'Votre formulaire a été supprimé avec succès'); 
    }
}
