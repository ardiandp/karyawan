<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Anggotakeluarga;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggotakeluarga>
 */
class AnggotakeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'karyawan_id' => Anggotakeluarga::factory()->create()->id,
            'nama' => $this->faker->name(),
            'hubungan' => $this->faker->randomElement(['Suami', 'Istri', 'Anak', 'Orang Tua']),
            'tanggal_lahir' => $this->faker->date(),
            'telepon' => $this->faker->optional()->phoneNumber(),
            'alamat' => $this->faker->optional()->address(),
        ];
    }
}
