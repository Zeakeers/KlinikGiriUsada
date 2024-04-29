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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id', true);
            $table->string('user_nowa')->unique();
            $table->timestamp('verified_at')->nullable();
            $table->string('user_sandi');
            $table->tinyInteger('user_idkategori')->index('user_idkategori');
            $table->integer('user_idpasien')->nullable()->index('user_idpasien');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
