<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotakeluarga extends Model
{
    use HasFactory;

    protected $table = 'anggota_keluarga';

    protected $fillable = [
        'karyawan_id',
        'nama',
        'hubungan',
        'tanggal_lahir',
        'telepon',
        'alamat',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
