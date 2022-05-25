<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulaire\Formulaire;

class MainController extends Controller
{
    /**
     * Permet d'afficher la page d'accueil
     */
    public function index(){
        return view('index');  
    }

    /**
     * Permet d'afficher le tableau de bord
     */
    public function dashboard(){
        $formulaire = Formulaire::orderBy('created_at', 'DESC')->paginate(3); 
        return view('dashboard', [
            'listeFormulaires' => $formulaire,
        ]); 
    }


}
