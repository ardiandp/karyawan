<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';

    protected $fillable = [
        'karyawan_id',
        'nama_institusi',
        'jenjang',
        'gelar',
        'bidang_studi',
        'tanggal_mulai',
        'tanggal_selesai',
        'nilai',
        'deskripsi',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}

