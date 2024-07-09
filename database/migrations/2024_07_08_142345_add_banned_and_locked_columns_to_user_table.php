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
            $table->timestamp('banned_at')
                ->after('email_verified_at')
                ->nullable();
            $table->timestamp('banned_until')
                ->after('banned_at')
                ->nullable();
            $table->string('ban_reason')
                ->after('banned_until')
                ->nullable();
            $table->string('banned_by')
                ->after('ban_reason')
                ->nullable();
            
            $table->timestamp('locked_at')
                ->after('ban_reason')
                ->nullable();
            $table->string('lock_reason')
                ->after('locked_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'banned_at',
                'banned_until',
                'ban_reason',
                'banned_by',
                'locked_at',
                'lock_reason',
            ]));
        });
    }
};
