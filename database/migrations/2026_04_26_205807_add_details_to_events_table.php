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
        Schema::table('events', function (Blueprint $blueprint) {
            $blueprint->string('category')->default('Spectacle')->after('title');
            $blueprint->string('event_time')->nullable()->after('event_date');
            $blueprint->string('location')->default('Reillon')->after('event_time');
            $blueprint->string('image_path')->nullable()->after('description');
            $blueprint->boolean('is_reported')->default(false)->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $blueprint) {
            $blueprint->dropColumn(['category', 'event_time', 'location', 'image_path', 'is_reported']);
        });
    }
};
