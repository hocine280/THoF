<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributFormulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribut_formulaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom_attribut_formulaire', 50);
            $table->boolean('require_attribut_formulaire');
            $table->string('placeholder_attribut_formulaire', 100);
            $table->string('value_attribut_formulaire', 100);
            $table->boolean('liste_deroulante'); 
            $table->integer('nombre_min')->nullable(); 
            $table->integer('nombre_max')->nullable(); 
            $table->foreignId('type_fichier_id')->contrained()->nullable(); 
            $table->foreignId('type_attribut_formulaire')->nullable()->constrained()->onDelete('cascade'); 
            $table->foreignId('partie_formulaire_id')->constrained()->onDelete('cascade'); 
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
        Schema::dropIfExists('attribut_formulaires');
    }
}
