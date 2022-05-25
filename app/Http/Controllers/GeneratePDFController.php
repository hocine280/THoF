<?php

namespace App\Http\Controllers;

use PDF; 
use Illuminate\Http\Request;
use App\Models\Demande\Demande;
use App\Models\Utilisateur\User;
use App\Models\Formulaire\Formulaire;
use App\Models\Formulaire\OptionsAttributFormulaire;

class GeneratePDFController extends Controller
{
    /**
     * Retourne la vue pdf.index, permet de mettre en forme le PDF d'un formulaire vide
     * @param int $id
     */
    public function index($id){
        $formulaireSelect = Formulaire::findOrFail($id); 
        $optionAttribut = OptionsAttributFormulaire::all(); 
        $auteurFormulaire = User::where('id', '=', $formulaireSelect->user_id)->get(); 
        return view('pdf.index', [
            'formulaireSelect' => $formulaireSelect, 
            'optionAttribut' => $optionAttribut, 
            'auteurFormulaire' => $auteurFormulaire, 
        ]); 
    }

    /**
     * Permet de générer le pdf d'un formulaire vide à partir de pdf.index
     * @param int $id
     */
    public function downloadPDFFormVide($id){
        $formulaireSelect = Formulaire::findOrFail($id); 
        $optionAttribut = OptionsAttributFormulaire::all(); 
        $auteurFormulaire = User::where('id', '=', $formulaireSelect->user_id)->get();
        $pdf = PDF::loadView('pdf.index', [
            'formulaireSelect' => $formulaireSelect, 
            'optionAttribut' => $optionAttribut, 
            'auteurFormulaire' => $auteurFormulaire, 
        ]);
        return $pdf->download($formulaireSelect->nom_formulaire.'.pdf');
    }

    /**
     * Retourne la vue pdf.demande, permet de mettre en forme le PDF d'une demande
     * @param int $id
     */
    public function pagePDFDemande(){
        $demande = Demande::findOrFail($id);
        $formulaireSelect = Formulaire::findOrFail($demande->formulaire_id); 
        $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
        return view('pdf.demande', [
            'demande'=>$demande, 
            'formulaireSelect' => $formulaireSelect, 
            'auteurDemande' => $auteurDemande, 
        ]); 
    }

    /**
     * Permet de générer le pdf d'une demande à partir de pdf.demande
     * @param int $id
     */
    public function downloadPDFDemande($id){
        $demande = Demande::findOrFail($id);
        $formulaireSelect = Formulaire::findOrFail($demande->formulaire_id); 
        $auteurDemande = User::where('id', '=', $demande->user_demande)->get(); 
        $auteur = User::where('id', '=', $demande->user_demande)->get()->first(); 
 
        $pdf = PDF::loadView('pdf.demande', [
            'demande'=>$demande, 
            'formulaireSelect' => $formulaireSelect, 
            'auteurDemande' => $auteurDemande, 
        ]); 
        return $pdf->download($formulaireSelect->nom_formulaire . ' - Demande effectuée par :' . $auteur->nom .' '. $auteur->prenom.'.pdf'); 
    }
}
