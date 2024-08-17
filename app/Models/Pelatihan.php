<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';


    protected $fillable = [
        'karyawan_id',
        'nama_pelatihan',
        'penyelenggara_pelatihan',
        'tanggal_pelatihan',
        'deskripsi',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }
}
