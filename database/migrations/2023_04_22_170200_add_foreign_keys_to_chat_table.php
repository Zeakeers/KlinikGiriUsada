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
        Schema::table('chat', function (Blueprint $table) {
            $table->foreign(['chat_usermasuk'], 'chat_ibfk_1')->references(['user_id'])->on('users');
            $table->foreign(['chat_userkeluar'], 'chat_ibfk_2')->references(['user_id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat', function (Blueprint $table) {
            //
        });
    }
};
