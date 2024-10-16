<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pegawai Seeder
        Pegawai::factory()->create([
            // 'avatar' => 'avatar',
            'name' => 'Admin',
            'nip' => '1',
            // 'email' => 'admin@localhost'
        ]);
        Pegawai::factory()->create([
            // 'avatar' => 'avatar',
            'name' => 'Pengawas',
            'nip' => '2',
            // 'email' => 'pengawas@localhost'
        ]);
        Pegawai::factory()->create([
            // 'avatar' => 'avatar',
            'name' => 'Unit',
            'nip' => '3',
            // 'email' => 'unit@localhost'
        ]);


        // User Seeder
        User::factory()->create([
            'username' => 'admin@localhost',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nip' => 1,
        ]);

        User::factory()->create([
            'username' => 'pengawas@localhost',
            'password' => Hash::make('password'),
            'role' => 'pengawas',
            'nip' => 2,
        ]);

        User::factory()->create([
            'username' => 'unit@localhost',
            'password' => Hash::make('password'),
            'role' => 'unit',
            'nip' => 3,
        ]);


        // Pegawai::factory(10)->create();
        // User::factory(10)->create();

        // $this->call(PegawaiSeeder::class);
        // $this->call(KategoriSeeder::class);
        // $this->call(ItemSeeder::class);
        // $this->call(SupplierSeeder::class);
        // $this->call(PengajuanSeeder::class);
        // $this->call(DetailPengajuanSeeder::class);
        // $this->call(PermintaanSeeder::class);
        // $this->call(DetailPermintaanSeeder::class);
        // $this->call(BarangMasukSeeder::class);
        // $this->call(DetailBarangMasukSeeder::class);
        // $this->call(BarangKeluarSeeder::class);
        // $this->call(DetailBarangKeluarSeeder::class);
    }
}
