<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Utilisateur\Formulaire;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'nom_formation' => 'Licence 1 - Mention informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 2 - Mention informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 3 - Mention informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 1 - CHPS - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 2 - CHPS - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 1 - Intelligence artificielle - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 2 - Intelligence artificielle - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 1 - RT-ASR - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 2 - RT-ASR - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('formations')->insert([
            'nom_formation' => 'Master 1 - RT-DAS - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Master 2 - RT-DAS - Informatique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);  

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 1 - Mention Génie civil',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 2 - Mention Génie civil',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 3 - Mention Génie civil',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 1 - Mention mathématiques',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 2 - Mention mathématiques',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 3 - Mention mathématiques',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 1 - Mention physique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 2 - Mention physique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 3 - Mention physique',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 1 - Mention portail BBTE',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 2 - Mention portail BBTE',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 3 - Mention portail BBTE',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 1 - Mention biochimie',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 2 - Mention biochimie',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('formations')->insert([
            'nom_formation' => 'Licence 3 - Mention biochimie',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
    }
}
