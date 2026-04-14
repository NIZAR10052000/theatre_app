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
    Schema::create('media', function (Blueprint $table) {
        $table->id();
        $table->string('file_path'); // Le chemin du fichier 
        $table->enum('type', ['photo', 'video'])->default('photo'); // Type de média
        $table->foreignId('event_id')->nullable()->constrained('events')->onDelete('cascade');
        $table->foreignId('member_id')->nullable()->constrained('members')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
