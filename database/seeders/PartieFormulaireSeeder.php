<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Formulaire\PartieFormulaire;

class PartieFormulaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Convention de stage
         */
        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Informations de l\'étudiant',
            'formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Informations de l\'entreprise',
            'formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Justifier une absence
         */
        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Informations de l\'étudiant',
            'formulaire_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Informations sur le cours manqué',
            'formulaire_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Demande de remboursement
         */
        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Demandeur',
            'formulaire_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Renseignements concernant la demande de remboursement',
            'formulaire_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Responsable module
         */
        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Informations personnelles',
            'formulaire_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('partie_formulaires')->insert([
            'titre_partie_formulaire' => 'Module souhaité',
            'formulaire_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
