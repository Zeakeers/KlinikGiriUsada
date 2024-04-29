<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KategoriKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_kerja')->insert([
            [
                'katekerja_nama' => 'Dokter',
            ],
            [
                'katekerja_nama' => 'Perawat',
            ],
            [
                'katekerja_nama' => 'Analisis',
            ],
            [
                'katekerja_nama' => 'Gizi',
            ],
            [
                'katekerja_nama' => 'Admin',
            ],
            [
                'katekerja_nama' => 'Farmasi',
            ],
            [
                'katekerja_nama' => 'Apoteker',
            ],
            [
                'katekerja_nama' => 'Cleaning Service',
            ],
            [
                'katekerja_nama' => 'Bidan',
            ],
        ]);
    }
}
