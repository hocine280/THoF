<?php

namespace App\Models\Demande;

use App\Models\Demande\Demande;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulaire\AttributFormulaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ValeurDemande extends Model
{
    use HasFactory;
    
    /**
     * Permet de définir le fait qu'une valeurDemande appartienne à une seule et unique demande
     */
    public function demande(){
       return  $this->belongsTo(Demande::class);
    }

    /**
     * Permet de définir le fait qu'une valeurDemande appartienne à un seule et unique AttributDemande
     */
    public function attributFormulaire(){
        return $this->belongsTo(AttributFormulaire::class); 
    }
}
