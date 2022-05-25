<?php

namespace App\Models\Formulaire;

use App\Models\Demande\PieceJointe;
use App\Models\Demande\ValeurDemande;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulaire\PartieFormulaire;
use App\Models\Formulaire\TypeAttributFormulaire;
use App\Models\Formulaire\OptionsAttributFormulaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributFormulaire extends Model
{
    use HasFactory;

    /**
     * Permet de définir le fait qu'un attribut appartiennent à une seule et unique partie
     */
    public static function  partie(){
        return $this->belongsTo(PartieFormulaire::class); 
    }

    /**
     * Permet de définir le fait qu'un attribut possède un seule et unique type d'attribut
     */
    public function typeAttribut(){
        return $this->HasOne(TypeAttributFormulaire::class); 
    }

    /**
     * Permet de définir le fait qu'un attribut possède plusieurs options quand ce dernier est un select
     */
    public function optionAttribut(){
        return $this->hasMany(OptionsAttributFormulaire::class); 
    }

    /**
     * Permet de définir le fait qu'une attribut peut avoir plusieurs valeur_demande
     */
    public function valeurDemande(){
        return $this->hasMany(ValeurDemande::class);   
    }

    /**
     * Permet de définir le fait qu'un attribut peut avoir une seul
     */
    public function pieceJointe(){
        return $this->hasOne(PieceJointe::class); 
    }
}
