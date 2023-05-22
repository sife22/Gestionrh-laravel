<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_employe');
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('adresse');
            $table->date('date_naissance');
            $table->date('date_embauche');
            $table->string('poste');
            $table->integer('salaire');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
