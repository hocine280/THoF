<?php

namespace App\Models\Formulaire;

use App\Models\Formulaire\Formulaire;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulaire\AttributFormulaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartieFormulaire extends Model
{
    use HasFactory;

    /**
     * Permet de définir le fait qu'une partie appartient seulement à un seul et unique formulaire
     */
    public function formulaire(){
        return $this->belongsTo(Formulaire::class); 
    }

    /**
     * Permet de définir le fait qu'une partie possède plusieurs attribut 
     */
    public function attribut(){
        return $this->hasMany(AttributFormulaire::class); 
    }
}
