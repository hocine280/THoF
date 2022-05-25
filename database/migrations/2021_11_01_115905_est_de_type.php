<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstDeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attribut_formulaires', function (Blueprint $table) {
            // $table->unsignedBigInteger('TypeAttribut')->after('ValueAttributFormulaire');
            // $table->foreign('TypeAttribut')->references('id')->on('type_attribut_formulaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribut_formulaires', function (Blueprint $table) {
            $table->dropForeign('TypeAttribut');
        });
    }
}
