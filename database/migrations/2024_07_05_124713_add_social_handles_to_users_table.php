<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('instagram_handle', 255)
                ->after('trial_ends_at')
                ->nullable()
                ->unique();

            $table->string('twitter_handle', 255)
                ->after('instagram_handle')
                ->nullable()
                ->unique();

            $table->string('tiktok_handle', 255)
                ->after('twitter_handle')
                ->nullable()
                ->unique();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'instagram_handle',
                'twitter_handle',
                'tiktok_handle',
            ]));
        });
    }
};
