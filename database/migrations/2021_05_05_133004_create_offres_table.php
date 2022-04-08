<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre_offre');
            $table->string('domaine_offre');
            $table->string('region_offre');
            $table->string('contrat_offre');
            $table->string('date_offre');
            $table->string('date_fin_offre');
            $table->string('salaire_offre');
            $table->string('fonction_offre');
            $table->string('entreprise_offre');
            $table->string('niveau_etude_offre');
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
        Schema::dropIfExists('offres', function(Blueprint $table){
            $table->increments('id');
            $table->dropColumn('titre_offre');
            $table->dropColumn('domaine_offre');
            $table->dropColumn('region_offre');
            $table->dropColumn('contrat_offre');
            $table->dropColumn('date_offre');
            $table->dropColumn('date_fin_offre');
            $table->dropColumn('salaire_offre');
            $table->dropColumn('fonction_offre');
            $table->dropColumn('entreprise_offre');
            $table->dropColumn('niveau_etude_offre');
        });
    }
}
