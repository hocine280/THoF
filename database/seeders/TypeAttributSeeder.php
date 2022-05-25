<?php

namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Formulaire\TypeAttributFormulaire;

class TypeAttributSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'date',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),   
        ]);
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'email',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'fichier',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'nombre',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'téléphone',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'zone de texte',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
        DB::table('type_attribut_formulaires')->insert([
            'nom_type_attribut_formulaire' => 'select',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
    }
}
