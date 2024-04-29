<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daftar_layanan')->insert([
            [
                'daftar_tanggal' => '2023/05/24',
                'daftar_status' => 'BERLANGSUNG',
                'daftar_idpasien' => 1,
                'daftar_idjenis' => 1,
            ],
        ]);
    }
}

// php artisan db:seed --class=KategoriUserSeeder
// php artisan db:seed --class=KategoriKerjaSeeder
// php artisan db:seed --class=PekerjaSeeder
// php artisan db:seed --class=JenisLayananSeeder
// php artisan db:seed --class=UserSeeder
//masukkan user dulu
// php artisan db:seed --class=DaftarLayananSeeder
