<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User Seeder
        User::factory()->create([
            'nama' => 'Admin',
            'email' => 'admin@localhost',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);
        
        User::factory()->create([
            'nama' => 'Unit',
            'email' => 'unit@localhost',
            'role' => 'unit',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'nama' => 'Petugas',
            'email' => 'petugas@localhost',
            'role' => 'petugas',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'nama' => 'Pengawas',
            'email' => 'pengawas@localhost',
            'role' => 'pengawas',
            'password' => Hash::make('password')
        ]);

        User::factory(10)->create();

        $this->call(UnitSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(PengajuanSeeder::class);
        $this->call(DetailPengajuanSeeder::class);
        $this->call(PermintaanSeeder::class);
        $this->call(DetailPermintaanSeeder::class);
        $this->call(BarangMasukSeeder::class);
        $this->call(DetailBarangMasukSeeder::class);
        $this->call(BarangKeluarSeeder::class);
        $this->call(DetailBarangKeluarSeeder::class);
    }
}
