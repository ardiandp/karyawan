<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'jabatan',
        'agama',
        'status_pegawai',
        'photo',
        'tanggal_bergabung',
    ];
    

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function pengalamankerja()
    {
        return $this->hasMany(Pengalamankerja::class);
    }

    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }

    public function anggotakeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class);
    }

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class);
    }

    public function penghargaan()
    {
        return $this->hasMany(Penghargaan::class);
    }

    public function keahlian()
    {
        return $this->hasMany(Keahlian::class);
    }

    
}

