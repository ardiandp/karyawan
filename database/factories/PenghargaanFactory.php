<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use app\Models\Penghargaan;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penghargaan>
 */
class PenghargaanFactory extends Factory
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
            'nama_penghargaan' => $this->faker->word(),
            'tanggal_penghargaan' => $this->faker->date(),
            'deskripsi_penghargaan' => $this->faker->optional()->paragraph(),
        ];
    }
}
