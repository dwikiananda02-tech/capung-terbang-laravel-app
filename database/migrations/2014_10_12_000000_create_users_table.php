<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2026-10-07 21:06:45',
            'password' => 'GANTI_DENGAN_HASH_BCRYPT_LENGKAP',
            'remember_token' => null,
            'created_at' => '2026-10-07 21:06:45',
            'updated_at' => '2026-10-07 21:06:45',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
