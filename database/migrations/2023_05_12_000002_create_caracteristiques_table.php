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
        Schema::create('caracteristiques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->text('valeur');
            $table->unsignedBigInteger('bien_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristiques');
    }
};
