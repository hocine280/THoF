<?php

namespace App\Models\Formulaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsAttributFormulaire extends Model
{
    use HasFactory;

    /**
     * Une optionAttribut appartient qu'a un seul attributFormulaire
     */
    public function attribut(){
        return $this->belongsTo(AttributFormulaire::class);
    }
}
