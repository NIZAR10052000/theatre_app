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
        // Supprimer tous les utilisateurs non-admin (troupes et users)
        \DB::table('users')->whereIn('role', ['user', 'troupe'])->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rien à restaurer - suppression intentionnelle
    }
};
