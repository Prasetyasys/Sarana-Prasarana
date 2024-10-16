<?php

namespace Database\Seeders;

use App\Models\DetailPengadaan;
use App\Models\DetailPengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPengadaan::factory(10)->create();
    }
}
