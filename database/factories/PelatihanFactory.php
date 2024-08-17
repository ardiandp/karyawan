<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pelatihan;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelatihan>
 */
class PelatihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'karyawan_id' => Karyawan::factory(),
            'nama_pelatihan' => $this->faker->company(),
            'penyelenggara_pelatihan' => $this->faker->company(),
            'tanggal_pelatihan' => $this->faker->date(),
            'deskripsi' => $this->faker->optional()->paragraph(),
        ];
    }
}
