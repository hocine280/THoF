<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Formulaire\OptionsAttributFormulaire;

class options_attribut_formulaires extends Seeder
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
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Oui',
            'attribut_formulaires_id' => 22,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Non',
            'attribut_formulaires_id' => 22,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /**
         * Demande de remboursement
         */

        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Monsieur',
            'attribut_formulaires_id' => 29,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Madame',
            'attribut_formulaires_id' => 29,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Bousier(ère) sur critères sociaux',
            'attribut_formulaires_id' => 39,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Bousier(ère) sur critères sociaux',
            'attribut_formulaires_id' => 39,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Bousier(ère) étranger(ère) du gouvernement français',
            'attribut_formulaires_id' => 39,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Formation en alternance',
            'attribut_formulaires_id' => 39,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Césure',
            'attribut_formulaires_id' => 39,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('options_attribut_formulaires')->insert([
            'value_options_attribut_formulaire' => 'Enjambement',
            'attribut_formulaires_id' => 39,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
