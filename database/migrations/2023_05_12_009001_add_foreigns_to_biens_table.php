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
        Schema::table('biens', function (Blueprint $table) {
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('gerant_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('modele_id')
                ->references('id')
                ->on('modeles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('marque_id')
                ->references('id')
                ->on('marques')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biens', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['gerant_id']);
            $table->dropForeign(['modele_id']);
            $table->dropForeign(['marque_id']);
        });
    }
};
