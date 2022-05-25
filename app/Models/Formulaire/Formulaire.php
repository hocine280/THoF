<?php

namespace App\Models\Formulaire;

use App\Models\Demande\Demande;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulaire\PartieFormulaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formulaire extends Model
{
    use HasFactory;

    /**
     * Permet de définir le fait qu'un formulaire puisse possèder plusieurs parties
     */
    public function parts(){
        return $this->hasMany(PartieFormulaire::class); 
    }

    /**
     * Permet de définir le fait qu'un formulaire puisse possèder plusieurs demande
     */
    public function demande(){
        return $this->hasMany(Demande::class); 
    }
}
