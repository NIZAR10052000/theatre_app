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
        Schema::table('events', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            $table->string('price')->nullable()->after('description');
            $table->string('duration')->nullable()->after('price');
            $table->string('booking_url')->nullable()->after('duration');
            $table->text('credits')->nullable()->after('booking_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'price', 'duration', 'booking_url', 'credits']);
        });
    }
};
