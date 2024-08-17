<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalamankerja extends Model
{
    use HasFactory;
    protected $table = 'pengalaman_kerja';


    protected $fillable = [
        'karyawan_id',
        'nama_perusahaan',
        'jabatan',
        'tanggung_jawab',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
