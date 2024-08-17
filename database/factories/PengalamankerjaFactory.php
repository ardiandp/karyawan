<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pengalamankerja;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengalamankerja>
 */
class PengalamankerjaFactory extends Factory
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
            'nama_perusahaan' => $this->faker->company(),
            'jabatan' => $this->faker->jobTitle(),
            'tanggung_jawab' => $this->faker->optional()->words(5, true),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->optional()->date(),
        ];
    }
}
