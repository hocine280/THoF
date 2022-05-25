<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormulaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         
        return [
            'titreFormulaire' => 'required | max : 255', 
            'description' => 'required | max : 255', 
            'titrePartie0'=> 'required | max : 10', 
            'titrePartie1'=> 'required | max : 10', 
            'titrePartie2'=> 'required | max : 10', 
        ];
    }

    /**
     * Permet de gérer les messages afficher lors des erreurs et en fonction du type de l'erreur
     */
    public function messages(){
        return [
            // Titre du formulaire
            'titreFormulaire.request' => 'Le champ titre du formulaire doit être rempli', 
        ]; 
    }

    public function attributes(){
        return[
            'titreFormulaire' => 'titreFormulaire', 
            'description' => 'description', 
            'titrePartie0' => 'titrePartie0', 
            'titrePartie1' => 'titrePartie1', 
            'titrePartie2' => 'titrePartie2', 
        ]; 
    }
}
