<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pendidikan;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'karyawan_id' => function () {
                return Pendidikan::factory()->create()->id;
            },
            'nama_institusi' => $this->faker->company(),
            'gelar' => $this->faker->jobTitle(),
            'bidang_studi' => $this->faker->word(),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->optional()->date(),
            'nilai' => $this->faker->optional()->numberBetween(1, 100),
            'deskripsi' => $this->faker->optional()->paragraph(),
        ];
    }
}
