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
        Schema::table('caracteristiques', function (Blueprint $table) {
            $table
                ->foreign('bien_id')
                ->references('id')
                ->on('biens')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('caracteristiques', function (Blueprint $table) {
            $table->dropForeign(['bien_id']);
        });
    }
};
