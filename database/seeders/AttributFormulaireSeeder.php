<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Formulaire\AttributFormulaire;

class AttributFormulaireSeeder extends Seeder
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
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Nom', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Prenom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Prénom', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Date de naissance',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Date de naissance', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 2, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Formation actuelle',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Votre formation au moment du stage', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 


        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom de l\'entreprise',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Nom de l\'entreprise dans laquelle le stage sera effectué', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Date début stage',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Date de début du stage', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 2, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Date fin stage',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Date de fin du stage', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 2, 
            'partie_formulaire_id' => 1, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom représentant',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Nom du signataire de la convention', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Prénom représentant',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Prénom du signataire de la convention', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Qualité représentant',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Qualité du signataire de la convention au sein de l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Tel entreprise',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Téléphone pour contacter l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 6, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Email entreprise',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Email de l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 3, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Adresse entreprise',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Adresse postale de l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'N° de SIRET',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Ex : 365 254 256 00025', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s') 
        ]); 

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'APE entreprise',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Code APE de l\'entreprise (autrefois NAF)', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Activité entreprise',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Activité principale de l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Service stage',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Service dans lequel le stagiaire sera affecté', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom tuteur',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Nom du tuteur dans l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Prénom tuteur',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Prénom du tuteur dans l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 6, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Qualité tuteur',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Qualité du tuteur dans l\'entreprise', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Tel tuteur',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Téléhpone du tuteur', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 0, 
            'type_attribut_formulaire' => 6, 
            'partie_formulaire_id' => 2, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Justifier une absence
         */
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Boulanger', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 3, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Prenom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Hugo', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 3, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Adresse e-mail',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'boulanger.hugo@mail.fr', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 3, 
            'partie_formulaire_id' => 3, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Formation actuelle',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Licence Informatique - L1', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 3, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom module',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'INFO0303', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 4, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom du professeur',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Mr RABAT', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 4, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Justificatif d\'absence',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Justificatif d\'absence', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_fichier_id' => 3, 
            'type_attribut_formulaire' => 4, 
            'partie_formulaire_id' => 4, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Demande de remboursement
         */
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Civilité',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Civilité', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 1, 
            'type_attribut_formulaire' => 8, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Boulanger', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Prénom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Julie', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Date de naissance',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => '12-12-2000', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 2, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Adresse',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => '25 rue de la Paix', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Ville',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Reims', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Code postal',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => '51100', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 100000,
            'type_attribut_formulaire' => 5, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'N° de téléphone',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => '0658982514', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Adresse e-mail',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'boulnager.julie@email.fr', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 3, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Formation (Niveau d\'étude)',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Licence 1', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 5, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Motif du remboursement',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Licence 1', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 1, 
            'type_attribut_formulaire' => 8, 
            'partie_formulaire_id' => 6, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Montant que vous avez payé lors de l\'inscription',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => '270', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0,
            'nombre_max'=>500, 
            'type_attribut_formulaire' => 5, 
            'partie_formulaire_id' => 6, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Responsable module
         */
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Dupont', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 7, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Prénom',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Sébastien', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 7, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Diplôme',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Bac +8 en informatique', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 7, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Nom du module',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'INFO0305', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'type_attribut_formulaire' => 1, 
            'partie_formulaire_id' => 8, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('attribut_formulaires')->insert([
            'nom_attribut_formulaire' => 'Justifier votre choix',
            'require_attribut_formulaire' => 1, 
            'placeholder_attribut_formulaire' => 'Je souhaite ...', 
            'value_attribut_formulaire' => 'none', 
            'liste_deroulante' => 0, 
            'nombre_min' => 0, 
            'nombre_max' => 255, 
            'type_attribut_formulaire' => 7,
            'partie_formulaire_id' => 8, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
