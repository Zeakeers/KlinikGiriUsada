<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
   
    use HasFactory;
    protected $table="rekam_medis";
    public $timestamps = false;
    protected $primaryKey = 'rekam_id';
    protected $fillable =  ['rekam_id',
                            'rekam_tanggal',
                            'rekam_terapinonobat',
                            'rekam_anamnesa',
                            'rekam_alergi',
                            'rekam_prognosa',
                            'rekam_terapiobat',
                            'rekam_bmhp',
                            'rekam_diagnosa',
                            'rekam_kesadaran',
                            'rekam_suhu',
                            'rekam_sistole',
                            'rekam_respiratorydate',
                            'rekam_diastole',
                            'rekam_heartrate',
                            'rekam_tinggibadan',
                            'rekam_beratbadan',
                            'rekam_lingkarperut',
                            'rekam_imt',
                            'rekam_kecelakaan',
                            'rekam_tenagamedis',
                            'rekam_statuspulang',
                            'rekam_idlayanan'];
}