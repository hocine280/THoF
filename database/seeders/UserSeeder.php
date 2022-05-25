<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Utilisateur\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('users')->insert([
                'nom' => 'HADID',
                'prenom' => 'Hocine', 
                'email' => 'hadid@hocine.fr', 
                'num_etudiant' => null, 
                'nom_formation' => null, 
                'role_id' => 3, 
                'email_verified_at' => null, 
                'password' => '$2y$10$kJgjqNM/AWkPe9VIaQ6Lru1fxbBXMJp012wdvF6T3Z1abjYjeYyJ2', 
                'two_factor_secret' => null, 
                'two_factor_recovery_codes' => null,
                'remember_token' => null, 
                'current_team_id' => null, 
                'profile_photo_path' => null, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]); 
    
            DB::table('users')->insert([
                'nom' => 'CHEMIN',
                'prenom' => 'Pierre',
                'email' => 'pierre.chemin@etudiant.univ-reims.fr',
                'num_etudiant' => null,
                'nom_formation' => null,
                'role_id' => 1,
                'email_verified_at' => null, 
                'password' => '$2y$10$Df1ian3j6nKwxjmAu.rOGOLNWfmX9rmdPLyZPYPENwCQuZzX//Ciq', 
                'two_factor_secret' => null, 
                'two_factor_recovery_codes' => null,
                'remember_token' => null, 
                'current_team_id' => null, 
                'profile_photo_path' => null, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')          
            ]);
    
            DB::table('users')->insert([
                'nom' => 'Jager',
                'prenom' => 'Eren',
                'email' => 'eren.jager@mail.fr',
                'num_etudiant' => null,
                'nom_formation' => null,
                'role_id' => 1,
                'email_verified_at' => null, 
                'password' => '$2y$10$aPlFJrH.zzkHVizto2S7Zedut3jfoyQ/DGO9Jp220lqfC6WwY9tIq', 
                'two_factor_secret' => null, 
                'two_factor_recovery_codes' => null,
                'remember_token' => null, 
                'current_team_id' => null, 
                'profile_photo_path' => null, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')          
            ]);
    
            DB::table('users')->insert([
                'nom' => 'Henry',
                'prenom' => 'Charles',
                'email' => 'charles.henry@mail.fr',
                'num_etudiant' => null,
                'nom_formation' => null,
                'role_id' => 2,
                'email_verified_at' => null, 
                'password' => '$2y$10$aPlFJrH.zzkHVizto2S7Zedut3jfoyQ/DGO9Jp220lqfC6WwY9tIq', 
                'two_factor_secret' => null, 
                'two_factor_recovery_codes' => null,
                'remember_token' => null, 
                'current_team_id' => null, 
                'profile_photo_path' => null, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')          
            ]);
    
            DB::table('users')->insert([
                'nom' => 'Fripouille',
                'prenom' => 'Jacquouille',
                'email' => 'jacquouille.fripouille@mail.fr',
                'num_etudiant' => null,
                'nom_formation' => null,
                'role_id' => 3,
                'email_verified_at' => null, 
                'password' => '$2y$10$aPlFJrH.zzkHVizto2S7Zedut3jfoyQ/DGO9Jp220lqfC6WwY9tIq', 
                'two_factor_secret' => null, 
                'two_factor_recovery_codes' => null,
                'remember_token' => null, 
                'current_team_id' => null, 
                'profile_photo_path' => null, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')          
            ]);
    
            DB::table('users')->insert([
                'nom' => 'copain',
                'prenom' => 'It\'sMe',
                'email' => 'me.copain@lescopains.fr',
                'num_etudiant' => null,
                'nom_formation' => null,
                'role_id' => 4,
                'email_verified_at' => null, 
                'password' => '$2y$10$aPlFJrH.zzkHVizto2S7Zedut3jfoyQ/DGO9Jp220lqfC6WwY9tIq', 
                'two_factor_secret' => null, 
                'two_factor_recovery_codes' => null,
                'remember_token' => null, 
                'current_team_id' => null, 
                'profile_photo_path' => null, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')          
            ]);
    
            User::factory()->count(10)->create();
    
    }
}
