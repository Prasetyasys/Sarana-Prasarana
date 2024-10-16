<?php

namespace Database\Seeders;

use App\Models\Pengadaan;
use App\Models\Pengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengadaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengadaan::factory(10)->create();
    }
}
