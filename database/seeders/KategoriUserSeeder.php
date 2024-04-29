<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KategoriUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_user')->insert([
            [
                'kateuser_jenis' => 'Admin',
            ],
            [
                'kateuser_jenis' => 'Pasien',
            ],
        ]);
    }
}
