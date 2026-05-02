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
        Schema::table('media', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('pending'); // pending, published
            $table->string('category')->default('spectacle'); // spectacle, tuto, formation
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Qui a posté le média
        });
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['title', 'description', 'status', 'category', 'user_id']);
        });
    }
};
