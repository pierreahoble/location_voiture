<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('immatriculation')->nullable();
            $table->float('prix_jour')->nullable();
            $table->string('annee')->nullable();
            $table->string('couleur')->nullable();
            $table->string('type_consomation')->nullable();
            $table->string('transmission')->nullable();
            $table->string('conso_sur_cent')->nullable();
            $table->string('moteur')->nullable();
            $table->string('Nbre_porte')->nullable();
            $table->string('Nbre_place')->nullable();
            $table->text('Description')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('gerant_id')->nullable();
            $table->unsignedBigInteger('modele_id');
            $table->unsignedBigInteger('marque_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
