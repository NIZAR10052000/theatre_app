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
        Schema::table('users', function (Blueprint $table) {
            // Modifier l'enum role pour ne permettre que 'admin'
            $table->enum('role', ['admin'])->default('admin')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revenir à l'ancien schema si needed
            $table->enum('role', ['client', 'admin', 'user', 'troupe'])->default('client')->change();
        });
    }
};
