<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Karyawan;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->generateNik(),
            'nama_depan' => $this->faker->firstName(),
            'nama_belakang' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon' => $this->faker->phoneNumber(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'jabatan' => $this->faker->jobTitle(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'status_pegawai' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
            'photo' => $this->faker->imageUrl(),
            'tanggal_bergabung' => $this->faker->date(),
        ];
    }

    private function generateNik()
    {
        // Kode wilayah: 6 digit
        $kodeWilayah = $this->faker->numberBetween(110000, 940000);

        // Tanggal lahir: 6 digit (DDMMYY)
        $tanggalLahir = $this->faker->date('dmY');
        $tanggalLahir = substr($tanggalLahir, 0, 2) . substr($tanggalLahir, 2, 2) . substr($tanggalLahir, 4, 2);

        // Nomor urut: 4 digit
        $nomorUrut = $this->faker->numberBetween(1000, 9999);

        return $kodeWilayah . $tanggalLahir . $nomorUrut;
    }
}
