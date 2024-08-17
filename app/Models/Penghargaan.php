<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    use HasFactory;

    protected $table = 'penghargaan';


    protected $fillable = [
        'karyawan_id',
        'nama_penghargaan',
        'tanggal_penghargaan',
        'deskripsi_penghargaan',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
