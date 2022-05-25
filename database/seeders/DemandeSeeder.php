<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Demande\Demande;

class DemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('demandes')->insert([
            'statut_demande_id' => 1,
            'user_id' => 4,
            'user_demande' => 3,
            'formulaire_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('demandes')->insert([
            'statut_demande_id' => 3,
            'user_id' => 4,
            'user_demande' => 3,
            'formulaire_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('demandes')->insert([
            'statut_demande_id' => 2,
            'user_id' => 5,
            'user_demande' => 4,
            'formulaire_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
