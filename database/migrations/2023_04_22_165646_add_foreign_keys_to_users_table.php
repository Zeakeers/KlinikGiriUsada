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
            $table->foreign(['user_idkategori'], 'users_ibfk_1')->references(['kateuser_id'])->on('kategori_user')->onDelete('CASCADE');
            $table->foreign(['user_idpasien'], 'users_ibfk_2')->references(['pasien_id'])->on('pasien')->onDelete('CASCADE');
            $table->string('remember_token', 64)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
