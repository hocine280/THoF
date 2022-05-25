<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Utilisateur\Role; 

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nom_role' => 'etudiant',
            'code_role' => 1508526, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 

        DB::table('roles')->insert([
            'nom_role' => 'prof',
            'code_role' => 1605879, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 

        DB::table('roles')->insert([
            'nom_role' => 'admin',
            'code_role' => 1985693, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 

        DB::table('roles')->insert([
            'nom_role' => 'extérieur',
            'code_role' => 1705891, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 
    }
}
