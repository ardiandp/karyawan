<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Menu;
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
        // Membuat user dengan role 'admin'
       // User::factory()->admin()->create();
    }
}
