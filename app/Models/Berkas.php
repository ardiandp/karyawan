<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';


    protected $fillable = [
        'karyawan_id',
        'jenis_berkas',
        'nama_berkas',
        'path_berkas',
        'tanggal_terbit',
        'tanggal_kadaluarsa',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
