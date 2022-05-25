<?php

namespace App\Models\Formulaire;

use Illuminate\Database\Eloquent\Model;
use App\Models\Formulaire\AttributFormulaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeAttributFormulaire extends Model
{
    use HasFactory;

    /**
     * Un type d'attribut peut appartenir à plusieurs attribut
     */
    public function attribut(){
        return $this->belongsToMany(AttributFormulaire::class); 
    }
}