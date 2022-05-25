<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Demande\ValeurDemande;

class ValeurDemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Jager",
            'demande_id' => 1,
            'attribut_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Eren",
            'demande_id' => 1,
            'attribut_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "12-05-2002",
            'demande_id' => 1,
            'attribut_formulaire_id' => 3, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Licence 2 - Mention Informatique",
            'demande_id' => 1,
            'attribut_formulaire_id' => 4, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Ubisoft",
            'demande_id' => 1,
            'attribut_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "11-04-2022",
            'demande_id' => 1,
            'attribut_formulaire_id' => 6, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "01-06-2022",
            'demande_id' => 1,
            'attribut_formulaire_id' => 7, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Gillet",
            'demande_id' => 1,
            'attribut_formulaire_id' => 8, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Adrien",
            'demande_id' => 1,
            'attribut_formulaire_id' => 9, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Responsable RH",
            'demande_id' => 1,
            'attribut_formulaire_id' => 10, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "0324297456",
            'demande_id' => 1,
            'attribut_formulaire_id' => 11, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "contact@ubisoft.com",
            'demande_id' => 1,
            'attribut_formulaire_id' => 12, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "3 rue des coquelicots 75001 Paris",
            'demande_id' => 1,
            'attribut_formulaire_id' => 13, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "364 568 251",
            'demande_id' => 1,
            'attribut_formulaire_id' => 14, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "5482445AE",
            'demande_id' => 1,
            'attribut_formulaire_id' => 15, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Créatrice de jeux vidéo",
            'demande_id' => 1,
            'attribut_formulaire_id' => 16, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Game design",
            'demande_id' => 1,
            'attribut_formulaire_id' => 17, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Lelouche",
            'demande_id' => 1,
            'attribut_formulaire_id' => 18, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Patricia",
            'demande_id' => 1,
            'attribut_formulaire_id' => 19, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Game designer",
            'demande_id' => 1,
            'attribut_formulaire_id' => 20, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "0652489563",
            'demande_id' => 1,
            'attribut_formulaire_id' => 21, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Monsieur",
            'demande_id' => 2,
            'attribut_formulaire_id' => 29, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Jager",
            'demande_id' => 2,
            'attribut_formulaire_id' => 30, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Eren",
            'demande_id' => 2,
            'attribut_formulaire_id' => 31, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "12-05-2002",
            'demande_id' => 2,
            'attribut_formulaire_id' => 32, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "2 rue des saucissons",
            'demande_id' => 2,
            'attribut_formulaire_id' => 33, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Reims",
            'demande_id' => 2,
            'attribut_formulaire_id' => 34, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "51100",
            'demande_id' => 2,
            'attribut_formulaire_id' => 35, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "065214587",
            'demande_id' => 2,
            'attribut_formulaire_id' => 36, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "eren.jager@mail.fr",
            'demande_id' => 2,
            'attribut_formulaire_id' => 37, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Licence 2 - Mention informatique",
            'demande_id' => 2,
            'attribut_formulaire_id' => 38, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Bousier(ère) sur critères sociaux",
            'demande_id' => 2,
            'attribut_formulaire_id' => 39, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "270",
            'demande_id' => 2,
            'attribut_formulaire_id' => 40, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Henry",
            'demande_id' => 3,
            'attribut_formulaire_id' => 41, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Charles",
            'demande_id' => 3,
            'attribut_formulaire_id' => 42, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "Doctorat informatique",
            'demande_id' => 3,
            'attribut_formulaire_id' => 43, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "INFO 0402",
            'demande_id' => 3,
            'attribut_formulaire_id' => 44, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('valeur_demandes')->insert([
            'valeur_champ' => "J'ai envie de faire ce module qui m'a tant inspiré dans ma carrière",
            'demande_id' => 3,
            'attribut_formulaire_id' => 45, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
