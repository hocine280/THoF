<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValeurDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valeur_demandes', function (Blueprint $table) {
            $table->id();
            $table->string('valeur_champ'); 
            $table->foreignId('demande_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('attribut_formulaire_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valeur_demandes');
    }
}
