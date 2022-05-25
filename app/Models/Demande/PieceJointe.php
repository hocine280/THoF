<?php

namespace App\Models\Demande;

use Illuminate\Database\Eloquent\Model;
use App\Models\Formulaire\AttributFormulaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PieceJointe extends Model
{
    use HasFactory;
    /**
     * Définition des champs que l'on peut remplir en base de données
     */
    protected $fillable = [
        'path_pj', 
    ]; 

    /**
     * Permet de définir qu'une pieceJointe appartienne à un seul et unique AttributFormulaire
     */
    public function attributFormulaire(){
        return $this->belongsTo(AttributFormulaire::class);
    }
}
 