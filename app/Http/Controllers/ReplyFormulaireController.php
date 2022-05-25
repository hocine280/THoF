<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande\Demande;
use App\Models\Utilisateur\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Formulaire\Formulaire;

class ReplyFormulaireController extends Controller
{
    /**
     * Retourne la vue reply-formulaire.index, qui permet de visualiser les demandes concernant les formulaires que l'on a créé
     */
    public function index()
    {
        $myReponseEnCours = Demande::where('statut_demande_id', '=', 1)->where('user_id', '=', Auth::id())->get(); 
        $myReponseRefusee = Demande::where('statut_demande_id', '=', 2)->where('user_id', '=', Auth::id())->get(); 
        $myReponseTerminee = Demande::where('statut_demande_id', '=', 3)->where('user_id', '=', Auth::id())->get(); 
        return view('reply-formulaire.index', [
            'myReponseEnCours'=>$myReponseEnCours, 
            'myReponseRefusee'=>$myReponseRefusee, 
            'myReponseTerminee' => $myReponseTerminee, 
        ]); 
    }

    /**
     * Retourne la vue reply-formulaire.show, qui permet d'afficher une demande d'un de nos formulaires que l'on a crée
     * @param int $id
     */
    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        $formulaireSelect = Formulaire::findOrFail($demande->formulaire_id); 
        $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
        return view('reply-formulaire.show', [
            'demande'=>$demande, 
            'formulaireSelect' => $formulaireSelect, 
            'auteurDemande' => $auteurDemande, 
        ]); 
    }

    /**
     * Permet de confirmer une demande
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $demande = Demande::where('id', '=', $id)->update([
            "statut_demande_id" => 3, 
        ]); ; 
        return back()->with('success', 'Votre confirmation a bien été prise en compte'); 
    }
    
    /**
     * Permet de refuser une demande
     * @param int $id
     */
    public function refusedReply($id){
        $demande = Demande::where('id', '=', $id)->update([
            "statut_demande_id" => 2, 
        ]); 
        return back()->with('success', 'Votre refus a bien été prise en compte'); 
    }
}
