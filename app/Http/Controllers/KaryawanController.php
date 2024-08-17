<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Pendidikan;
use App\Models\Berkas;
use App\Models\AnggotaKeluarga;
use App\Models\PengalamanKerja;
use App\Models\Keahlian;
use App\Models\Pelatihan;
use App\Models\Penghargaan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with(['pendidikan', 'berkas', 'anggotaKeluarga', 'pengalamanKerja', 'keahlian', 'pelatihan', 'penghargaan'])->get();
        return view('karyawan.index', compact('karyawan'));
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $karyawan->delete();
            return redirect()->route('karyawan.index')->with('success', 'Data berhasil dihapus');
        }
        return redirect()->route('karyawan.index')->with('error', 'Data tidak ditemukan');
    }

    public function create()
    {
        return view('karyawan.create');
    }
}
