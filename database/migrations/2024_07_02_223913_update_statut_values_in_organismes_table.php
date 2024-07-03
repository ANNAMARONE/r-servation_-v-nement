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
            DB::table('organismes')->where('statut', 'accepter')->update(['statut' => 'valider']);
            DB::table('organismes')->where('statut', 'refuser')->update(['statut' => 'bloquer']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organismes', function (Blueprint $table) {
            //
            DB::table('organismes')->where('statut', 'valider')->update(['statut' => 'accepter']);
            DB::table('organismes')->where('statut', 'bloquer')->update(['statut' => 'refuser']);
        
        });
    }
};
