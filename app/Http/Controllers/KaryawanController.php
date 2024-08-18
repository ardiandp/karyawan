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

    public function create()
    {
        return view('karyawan.create');
    }
    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan');
    }

    
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            return view('karyawan.edit', compact('karyawan'));
        }
        return redirect()->route('karyawan.index')->with('error', 'Data tidak ditemukan');
    }

    
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $karyawan->update($request->all());
            return redirect()->route('karyawan.index')->with('success', 'Data berhasil diupdate');
        }
        return redirect()->route('karyawan.index')->with('error', 'Data tidak ditemukan');
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

    public function profil($id)
    {
        /*$karyawan = Karyawan::find($id);
        $anggota_keluarga = AnggotaKeluarga::where('karyawan_id', $id)->get();
        $berkas = Berkas::where('karyawan_id', $id)->get();
        $pendidikan = Pendidikan::where('karyawan_id', $id)->get();
        $pengalaman_kerja = PengalamanKerja::where('karyawan_id', $id)->get();
        return view('karyawan.profil', compact('karyawan', 'anggota_keluarga', 'berkas', 'pendidikan', 'pengalaman_kerja')); */


        // Mengambil data karyawan berdasarkan id_karyawan
        $karyawan = Karyawan::with(['pendidikan', 'anggotaKeluarga'])
            ->where('id', $id)
            ->firstOrFail();

        // Menampilkan view profil dengan data yang diambil
        return view('karyawan.profil', compact('karyawan'));
    }

   
}
