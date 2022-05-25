<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Formulaire\Formulaire;

class FormulaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formulaires')->insert([
            'nom_formulaire' => 'Convention de stage',
            'description_formulaire' => 'Permet de réaliser une demande de convention de stage', 
            'role_id' => 1,
            'user_id' => 4, 
            'method_formulaire' => 'POST', 
            'target_formulaire' => 'none', 
            'action_formulaire' => 'route()', 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formulaires')->insert([
            'nom_formulaire' => 'Justifier une absence',
            'description_formulaire' => 'Vous avez raté un cours, mais vous avez une justification ? Déposez la ici !', 
            'role_id' => 1,
            'user_id' => 4, 
            'method_formulaire' => 'POST', 
            'target_formulaire' => 'none', 
            'action_formulaire' => 'route()', 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formulaires')->insert([
            'nom_formulaire' => 'Demande de remboursement',
            'description_formulaire' => 'Demander un remboursement de vos frais de scolarité', 
            'role_id' => 1,
            'user_id' => 5, 
            'method_formulaire' => 'POST', 
            'target_formulaire' => 'none', 
            'action_formulaire' => 'route()', 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formulaires')->insert([
            'nom_formulaire' => 'Obtenir la gestion d\'un module',
            'description_formulaire' => 'Etre responsable d\'un module', 
            'role_id' => 2,
            'user_id' => 5, 
            'method_formulaire' => 'POST', 
            'target_formulaire' => 'none', 
            'action_formulaire' => 'route()', 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

    }
}
