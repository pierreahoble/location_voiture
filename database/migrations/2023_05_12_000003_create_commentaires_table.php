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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_prenom');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->text('message');
            $table->unsignedBigInteger('bien_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
