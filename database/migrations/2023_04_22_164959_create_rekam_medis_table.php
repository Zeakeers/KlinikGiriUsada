<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->integer('rekam_id', true);
            $table->date('rekam_tanggal');
            $table->text('rekam_keluhan')->nullable();
            $table->text('rekam_anamnesa')->nullable();
            $table->text('rekam_alergi')->nullable();
            $table->text('rekam_prognosa')->nullable();
            $table->text('rekam_terapiobat')->nullable();
            $table->text('rekam_terapinonobat')->nullable();
            $table->text('rekam_bmhp')->nullable();
            $table->text('rekam_diagnosa')->nullable();
            $table->text('rekam_kesadaran')->nullable();
            $table->tinyInteger('rekam_suhu')->nullable();
            $table->integer('rekam_sistole')->nullable();
            $table->integer('rekam_respiratorydate')->nullable();
            $table->integer('rekam_diastole')->nullable();
            $table->integer('rekam_heartrate')->nullable();
            $table->integer('rekam_tinggibadan')->nullable();
            $table->integer('rekam_beratbadan')->nullable();
            $table->integer('rekam_lingkarperut')->nullable();
            $table->integer('rekam_imt')->nullable();
            $table->text('rekam_kecelakaan')->nullable();
            $table->text('rekam_tenagamedis')->nullable();
            $table->text('rekam_statuspulang')->nullable();
            $table->integer('rekam_idlayanan')->index('rekam_idlayanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
};
