<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceJointesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pj');
            $table->string('path_pj')->nullable();
            $table->string('fichier_acceptee')->nullable(); 
            $table->foreignId('demande_id')->contrained()->onDelete('cascade')->nullable(); 
            $table->foreignId('attribut_formulaire_id')->constrained()->onDelete('cascade')->nullable(); 
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
        Schema::dropIfExists('piece_jointes');
    }
}
