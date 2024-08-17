<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Keahlian;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keahlian>
 */
class KeahlianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'karyawan_id' => Karyawan::factory()->create()->id,
            'nama_keahlian' => $this->faker->jobTitle(),
            'tingkat_keahlian' => $this->faker->randomElement(['Pemula', 'Menengah', 'Ahli']),
        ];
    }
}
