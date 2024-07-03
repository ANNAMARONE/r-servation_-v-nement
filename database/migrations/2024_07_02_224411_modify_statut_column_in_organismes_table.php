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
        Schema::table('organismes', function (Blueprint $table) {
            //
            $table->enum('statut', ['valider', 'bloquer'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organismes', function (Blueprint $table) {
            //
            $table->enum('statut', ['accepter', 'refuser'])->change();
        });
    }
};
