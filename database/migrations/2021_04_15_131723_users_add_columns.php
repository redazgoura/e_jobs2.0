<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function(Blueprint $table){
            $table->renameColumn("name","nom");
            $table->string("prenom");
            $table->string("ville");
            $table->string("adresse");
            $table->string("region");
            $table->string("fonction");
            $table->string("numeroTele");
            $table->string("type");
            $table->integer("disponibilite");
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
           //
           Schema::table('users',function(Blueprint $table){
            $table->dropColumn("prenom");
            $table->dropColumn("nom");
            $table->dropColumn("ville");
            $table->dropColumn("adresse");
            $table->dropColumn("region");
            $table->dropColumn("fonction");
            $table->dropColumn("numeroTele");
            $table->dropColumn("type");
            $table->dropColumn("disponibilite");
        
        });
    }
}
