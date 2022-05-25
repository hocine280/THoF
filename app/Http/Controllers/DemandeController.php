<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande\Demande;
use App\Models\Utilisateur\User;
use App\Models\Demande\PieceJointe;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande\ValeurDemande;
use App\Models\Formulaire\Formulaire;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Formulaire\PartieFormulaire;
use App\Models\Formulaire\AttributFormulaire;
use App\Models\Formulaire\OptionsAttributFormulaire;

class DemandeController extends Controller
{
    /**
     * Retourne la vue demande.request-progress, qui permet de consulter ces demandes en cours
     */
    public function index(){ 
        $myReponseEnCours = Demande::where('statut_demande_id', '=', 1)->where('user_demande', '=', Auth::id())->get(); 
        $myReponseRefusee = Demande::where('statut_demande_id', '=', 2)->where('user_demande', '=', Auth::id())->get();         
        return view('demande.request-progress', [
            'myReponseEnCours'=>$myReponseEnCours, 
            'myReponseRefusee'=>$myReponseRefusee,
        ]); 
    }

    
    /**
     * Retourne la vue demande.request-all, qui permet de consulter toutes ces demandes
     */
    public function requestAll(){
        $allDemande = Demande::where('user_demande', '=', Auth::id())->orderBy('created_at', 'DESC')->paginate(10); 
        $nbRepEnCours = count(Demande::where('statut_demande_id', '=', 1)->where('user_demande', '=', Auth::id())->get()); 
        $nbRepRefusee = count(Demande::where('statut_demande_id', '=', 2)->where('user_demande', '=', Auth::id())->get()); 
        $nbRepTerminee = count(Demande::where('statut_demande_id', '=', 3)->where('user_id', '=', Auth::id())->get()); 
        return view('demande.request-all', [
            'allDemande'=>$allDemande, 
            'nbRepEnCours'=>$nbRepEnCours, 
            'nbRepRefusee'=>$nbRepRefusee, 
            'nbRepTerminee'=>$nbRepTerminee, 
        ]); 
    }

    /**
     * Retourne la vue demande.all-demande-admin, qui permet de consulter toutes les demandes de la plateforme lorsque l'on a le statut "admin" (role_id=3)
     */
    public function allDemandeAdmin(){
        $demandes = Demande::orderBy('created_at', 'DESC')->paginate(20); 
        $nbRepEnCours = count(Demande::where('statut_demande_id', '=', 1)->get()); 
        $nbRepRefusee = count(Demande::where('statut_demande_id', '=', 2)->get()); 
        $nbRepTerminee = count(Demande::where('statut_demande_id', '=', 3)->get()); 
        
        return view('demande.all-demande-admin', [
            'demandes' => $demandes, 
            'nbRepEnCours' => $nbRepEnCours, 
            'nbRepRefusee'=>$nbRepRefusee, 
            'nbRepTerminee'=>$nbRepTerminee, 
        ]); 
    }

    /**
     * Permet de créer une demande à partir d'un formulaire
     *      - Vérifier si l'on possède les bons droits afin de créer une demande concernant le formulaire en question
     *      - Vérification des champs
     *      - Enregistrement en base de données de la demande
     * @param Request $request
     * @param int $idFormulaire
     */
    public static function store(Request $request, int $idFormulaire){

        $formulaire = Formulaire::where('id', '=', $idFormulaire)->get()->first(); 
        if($formulaire->role_id == auth()->user()->role_id){
            $rules=[]; 
            $messageError=[];  
            $partieFormulaire = PartieFormulaire::where('formulaire_id', '=', $idFormulaire)->get(); 
            foreach($partieFormulaire as $part){
                $attributFormulaire = AttributFormulaire::where('partie_formulaire_id', '=', $part->id)->get(); 
                foreach($attributFormulaire as $attr){
                    // Vérification des données saisi par l'utilisateur
                    $rules['champ'.$attr->id] = 'required | max : 255'; 
                    $messageError['champ'.$attr->id.'.required'] = "Ce champ est obligatoire"; 
                    $messageError['champ'.$attr->id.'.max'] = "Ce champ ne doit pas dépasser 255 caractères"; 
                    if($attr->type_fichier_id == 1){
                        $rules['champ'.$attr->id] = ' required | mimes:png';
                        $messageError['champ'.$attr->id.'.mimes'] = "Ce fichier doit etre un fichier PNG"; 
                    }else if($attr->type_fichier_id == 2){
                        $rules['champ'.$attr->id] = ' required | mimes:jpg';
                        $messageError['champ'.$attr->id.'.mimes'] = "Ce fichier doit etre un fichier JPG"; 
                    }else if($attr->type_fichier_id == 3){
                        $rules['champ'.$attr->id] = ' required | mimetypes:application/pdf';
                        $messageError['champ'.$attr->id.'.mimetypes'] = "Ce fichier doit etre un fichier PDF"; 
                    }
                }
            }
            $request->validate($rules, $messageError);  
            // Enregistrement dans la table "demande"
            $formulaire = Formulaire::find($idFormulaire); 
            $demande = new Demande(); 
            $demande->statut_demande_id = 1; 
            $demande->formulaire_id = $idFormulaire; 
            $demande->user_id = $formulaire->user_id; 
            $demande->user_demande = Auth::id(); 
            $demande->save(); 
            foreach($partieFormulaire as $part){
                $attributFormulaire = AttributFormulaire::where('partie_formulaire_id', '=', $part->id)->get(); 
                foreach($attributFormulaire as $attr){
                    // Enregistrement des données saisi par l'utilisateur
                    if(empty($_FILES['champ'.$attr->id])==true){
                        $valeurDemande = new ValeurDemande(); 
                        $valeurDemande->valeur_champ = $_POST['champ'.$attr->id]; 
                        $valeurDemande->demande_id = $demande->id;
                        $valeurDemande->attribut_formulaire_id = $attr->id; 
                        $valeurDemande->save(); 
                    }else if(empty($_FILES['champ'.$attr->id]==false)){
                        $champ = "champ".$attr->id; 
                        $path = $request->$champ->store('fichiersFormulaire', 'public'); 
                        $piece_jointe = new PieceJointe(); 
                        $piece_jointe->nom_pj = $_FILES['champ'.$attr->id]["name"]; 
                        $piece_jointe->demande_id = $demande->id; 
                        $piece_jointe->path_pj = $path; 
                        $piece_jointe->attribut_formulaire_id = $attr->id; 
                        $piece_jointe->save(); 
                    }
                }
            }
            return Redirect::route('demande.index')->with('success', 'Votre demande a bien été prise en compte'); 
        }else{
            return back()->with('danger', 'Vous n\'avez pas les droits nécessaires pour créer une demande concernant ce formulaire'); 
        }
    }

    /**
     * Retourne la vue demande.show, qui permet de visualiser un formulaire, de le remplir et de soumettre une demande
     * @param int $id
     */
    public function show($id){
        $formulaireSelect = Formulaire::findOrFail($id); 
        $optionAttribut = OptionsAttributFormulaire::all(); 
        $auteurFormulaire = User::where('id', '=', $formulaireSelect->user_id)->get(); 
        return view('demande.show', [
            'formulaireSelect' => $formulaireSelect, 
            'optionAttribut' => $optionAttribut, 
            'auteurFormulaire' => $auteurFormulaire, 
        ]); 
    }

    /**
     * Retourne la vue demande.show-progress, qui permet de visualiser une demande en cours
     */
    public function showProgress($id){
        $demande = Demande::findOrFail($id);
        $formulaireSelect = Formulaire::findOrFail($demande->formulaire_id); 
        $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
        return view('demande.show-progress', [
            'demande'=>$demande, 
            'formulaireSelect' => $formulaireSelect, 
            'auteurDemande' => $auteurDemande, 
        ]); 
    }

    /**
     * Permet de'enregistrer sur sa machine un fichier qui est contenu dans une demande
     * @param int $id
     */
    public function downloadFile($id){
        $piece_jointe = PieceJointe::where('demande_id','=', $id)->get()->first(); 
        $file_path = public_path('storage/'.$piece_jointe->path_pj); 
        return response()->download($file_path); 
    }

    /**
     * Retourne la vue demande.show-progress, qui permet de visualiser une demande en terminée
     * @param int $id
     */
    public function showAll($id){
        $demande = Demande::findOrFail($id);
        $formulaireSelect = Formulaire::findOrFail($demande->formulaire_id); 
        $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
        return view('demande.show-all', [
            'demande'=>$demande, 
            'formulaireSelect' => $formulaireSelect, 
            'auteurDemande' => $auteurDemande, 
        ]); 
    }

    /**
     * Retourne la vue demande.edit, qui permet de modifier une demande
     * @param int $id
     */
    public function edit($id){
        $demande = Demande::findOrFail($id);
        $formulaireSelect = Formulaire::findOrFail($demande->formulaire_id); 
        $optionAttribut = OptionsAttributFormulaire::all(); 
        $auteurFormulaire = User::where('id', '=', $demande->user_demande)->get(); 
        return view('demande.edit', [
            'demande' => $demande,
            'formulaireSelect' => $formulaireSelect, 
            'optionAttribut' => $optionAttribut, 
            'auteurFormulaire' => $auteurFormulaire, 
            
        ]);     
    }

    /**
     * Permet de verifier et d'enregistrer une modification de demande
     * @param Request $request
     * @param int $idFormulaire 
     * @param int $idDemande
     */
    public function update(Request $request, $idFormulaire, $idDemande){
        $rules=[]; 
        $messageError=[];  
        // $formulaire = Formulaire::find($idFormulaire); 
        $partieFormulaire = PartieFormulaire::where('formulaire_id', '=', $idFormulaire)->get(); 
        foreach($partieFormulaire as $part){
            $attributFormulaire = AttributFormulaire::where('partie_formulaire_id', '=', $part->id)->get(); 
            foreach($attributFormulaire as $attr){
                // Vérification des données saisi par l'utilisateur
                $rules['champ'.$attr->id] = 'required | max :255'; 
                $messageError['champ'.$attr->id.'.required'] = "Ce champ est obligatoire"; 
                $messageError['champ'.$attr->id.'.max'] = "Ce champ ne doit pas dépasser 255 caractères"; 
                if($attr->type_fichier_id == 1){
                    $rules['champ'.$attr->id] = ' required | mimes:png';
                    $messageError['champ'.$attr->id.'.mimes'] = "Ce fichier doit etre un fichier PNG"; 
                }else if($attr->type_fichier_id == 2){
                    $rules['champ'.$attr->id] = ' required | mimes:jpg';
                    $messageError['champ'.$attr->id.'.mimes'] = "Ce fichier doit etre un fichier JPG"; 
                }else if($attr->type_fichier_id == 3){
                    $rules['champ'.$attr->id] = ' required | mimetypes:application/pdf | max : 10000';
                    $messageError['champ'.$attr->id.'.mimetypes'] = "Ce fichier doit etre un fichier PDF"; 
                }
            }
        }
        $request->validate($rules, $messageError);  

        // Enregistrement dans la table "demande"
        $demande = Demande::find($idDemande);
        $demandeMaj=Demande::where('id', '=', $idDemande)->update([
            "statut_demande_id" => 1,
        ]); 
        foreach($partieFormulaire as $part){
            $attributFormulaire = AttributFormulaire::where('partie_formulaire_id', '=', $part->id)->get(); 
            foreach($attributFormulaire as $attr){
                // Enregistrement des données saisi par l'utilisateur
                if(empty($_FILES['champ'.$attr->id])==true){
                    $valeurDemande = ValeurDemande::where('demande_id', '=', $idDemande)->where('attribut_formulaire_id', '=', $attr->id)->update([
                        "valeur_champ" => $_POST['champ'.$attr->id], 
                        "demande_id" => $demande->id, 
                        "attribut_formulaire_id" => $attr->id, 
                    ]); 
                }else if(empty($_FILES['champ'.$attr->id])==false){
                    $champ = "champ".$attr->id; 
                    $path = $request->$champ->store('fichiersFormulaire', 'public'); 
                    $piece_jointe = PieceJointe::where('attribut_formulaire_id', '=', $attr->id)->update([
                        "nom_pj" => $_FILES['champ'.$attr->id]["name"], 
                        "path_pj" => $path, 
                    ]); 
                }

            }
        }
        return Redirect::route('demande.show-progress', $idDemande)->with('success', 'Vos modifications ont bien été prises en compte'); 
    }

    /**
     * Permet de supprimer une demande
     * @param int $id
     */
    public function destroy($id){
        $demande = Demande::findOrFail($id); 
        $valeurDemande = ValeurDemande::where('demande_id', '=', $demande->id); 
        $demande->delete(); 
        $valeurDemande->delete(); 
        return Redirect::route('demande.index')->with('success', 'Votre demande a été supprimé avec succès'); 
    }
}
