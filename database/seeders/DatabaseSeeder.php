<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DemandeSeeder;
use Database\Seeders\FormationSeeder;
use Database\Seeders\FormulaireSeeder;
use Database\Seeders\TypeFichierSeeder;
use Database\Seeders\TypeAttributSeeder;
use Database\Seeders\StatutDemandeSeeder;
use Database\Seeders\ValeurDemandeSeeder;
use Database\Seeders\PartieFormulaireSeeder;
use Database\Seeders\AttributFormulaireSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class); 
        $this->call(UserSeeder::class); 
        $this->call(TypeAttributSeeder::class); 
        $this->call(FormulaireSeeder::class); 
        $this->call(PartieFormulaireSeeder::class); 
        $this->call(AttributFormulaireSeeder::class);
        $this->call(options_attribut_formulaires::class);
        $this->call(StatutDemandeSeeder::class);
        $this->call(TypeFichierSeeder::class);
        $this->call(FormationSeeder::class);
        $this->call(DemandeSeeder::class);
        $this->call(ValeurDemandeSeeder::class);

    }
}
