<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Berkas;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berkas>
 */
class BerkasFactory extends Factory
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
                return Berkas::factory()->create()->id;
            },
            'jenis_berkas' => $this->faker->randomElement(['KTP', 'SIM', 'SKCK', 'Ijazah', 'Sertifikat']),
            'nama_berkas' => $this->faker->company,
            'path_berkas' => $this->faker->imageUrl(),
            'tanggal_terbit' => $this->faker->date(),
            'tanggal_kadaluarsa' => $this->faker->date('Y-m-d', '+1 year'),
        ];
    }
}
