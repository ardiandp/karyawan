<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Menu;
use App\Models\Karyawan;
use App\Models\Pendidikan;
use App\Models\Berkas;
use App\Models\Anggotakeluarga;
use App\Models\Pengalamankerja;
use App\Models\Keahliahan;
use App\Models\Penghargaan;
use App\Models\Pelatihan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Membuat user dengan role 'user'
        User::factory()->count(12)->create();
        Menu::factory()->count(10)->create();
        Karyawan::factory()->count(50)->create();
        Pendidikan::factory()->count(10)->create();
        Berkas::factory()->count(10)->create();
        Anggotakeluarga::factory()->count(10)->create();
        Pegalamankerja::factory()->count(10)->create();
        Keahliahan::factory()->count(10)->create();
        Pelatihan::factory()->count(10)->create();
        Penghargaan::factory()->count(10)->create();

        // Membuat user dengan role 'admin'
       // User::factory()->admin()->create();
    }
}
