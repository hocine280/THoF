<?php

namespace App\Models\Demande;

use App\Models\ValeurDemande;
use App\Models\Formulaire\Formulaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;
    
    /**
     * Permet de définir le fait qu'une demande possède plusieurs valeur_demande
     */
    public function valeurDemande(){
        return $this->hasMany(ValeurDemande::class); 
    }

    /**
     * Permet de définir le fait qu'une demande appartienne à un seul et unique formulaire
     */
    public function formulaire(){
        return $this->belongsTo(Formulaire::class); 
    }

    /**
     * Définition des champs que l'on remplit en base de données 
     */
    protected $fillable = [
        'valeur_champ', 
        'demande_id', 
        'attribut_formulaires_id', 
    ];
}
