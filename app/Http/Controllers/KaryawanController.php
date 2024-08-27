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



    public function anggotakeluargaupdate(Request $request, $id)
    {
        // Mengambil semua inputan dari form
        $input = $request->all();

        // Menghapus inputan yang tidak perlu, seperti _token
        unset($input['_token']);

        // Memperbarui data karyawan berdasarkan id_karyawan
        $anggota_keluarga = AnggotaKeluarga::find($id);
        if ($anggota_keluarga) {
            $anggota_keluarga->update($input);
            return redirect()->route('karyawan.profil', $anggota_keluarga->karyawan_id)->with('success', 'Data berhasil dihapus');
        }
        return redirect()->route('karyawan.profil', $anggota_keluarga->karyawan_id)->with('success', 'Data berhasil dihapus');
    }

    public function anggotakeluargadelete($id)
    {
        $anggota_keluarga = AnggotaKeluarga::find($id);
        $anggota_keluarga->delete();
        return redirect()->route('karyawan.profil', $anggota_keluarga->karyawan_id)->with('success', 'Data berhasil dihapus');
    }

 

    public function anggotakeluargastore(Request $request, $id)
    {
        $anggota_keluarga = new AnggotaKeluarga();
        $anggota_keluarga->karyawan_id = $id;
        $anggota_keluarga->nama = $request->nama;
        $anggota_keluarga->hubungan = $request->hubungan;
        $anggota_keluarga->tanggal_lahir = $request->tanggal_lahir;
        $anggota_keluarga->telepon = $request->telepon;
        $anggota_keluarga->alamat = $request->alamat;
        $anggota_keluarga->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }

    public function pendidikanstore(Request $request, $id)
    {
        $pendidikan = new Pendidikan();
        $pendidikan->karyawan_id = $id;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->jenjang = $request->jenjang;
        $pendidikan->gelar = $request->gelar;
        $pendidikan->bidang_studi = $request->bidang_studi;
        $pendidikan->tanggal_mulai = $request->tanggal_mulai;
        $pendidikan->tanggal_selesai = $request->tanggal_selesai;
        $pendidikan->nilai = $request->nilai;
        $pendidikan->deskripsi = $request->deskripsi;
        
        $pendidikan->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }


    
    public function pendidikanupdate(Request $request, $id, $pendidikan_id)
    {
        $pendidikan = Pendidikan::find($pendidikan_id);
        $pendidikan->karyawan_id = $id;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->jenjang = $request->jenjang;
        $pendidikan->gelar = $request->gelar;
        $pendidikan->bidang_studi = $request->bidang_studi;
        $pendidikan->tanggal_mulai = $request->tanggal_mulai;
        $pendidikan->tanggal_selesai = $request->tanggal_selesai;
        $pendidikan->nilai = $request->nilai;
        $pendidikan->deskripsi = $request->deskripsi;
        $pendidikan->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil diupdate');
    }


    public function pendidikandelete($id, $pendidikan_id)
    {
        $pendidikan = Pendidikan::find($pendidikan_id);
        $pendidikan->delete();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil dihapus');
    }


    public function berkasstore(Request $request, $id)
    {
        $berkas = new Berkas();
        $berkas->karyawan_id = $id;
        $berkas->jenis_berkas = $request->jenis_berkas;
        $berkas->nama_berkas = $request->nama_berkas;
        $berkas->path_berkas = $request->path_berkas;
        $berkas->tanggal_terbit = $request->tanggal_terbit;
        $berkas->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        
        $berkas->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }


    public function berkasupdate(Request $request, $id, $berkas_id)
    {
        $berkas = Berkas::find($berkas_id);
        $berkas->karyawan_id = $id;
        $berkas->jenis_berkas = $request->jenis_berkas;
        $berkas->nama_berkas = $request->nama_berkas;
        $berkas->path_berkas = $request->path_berkas;
        $berkas->tanggal_terbit = $request->tanggal_terbit;
        $berkas->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        
        $berkas->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil diupdate');
    }

    
    public function berkasdelete($id, $berkas_id)
    {
        $berkas = Berkas::find($berkas_id);
        $berkas->delete();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil dihapus');
    }

    
    public function pelatihanstore(Request $request, $id)
    {
        $pelatihan = new Pelatihan();
        $pelatihan->karyawan_id = $id;
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->penyelenggara_pelatihan = $request->penyelenggara_pelatihan;
        $pelatihan->tanggal_pelatihan = $request->tanggal_pelatihan;
        $pelatihan->deskripsi = $request->deskripsi;
        
        $pelatihan->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }

    
    public function pelatihanupdate(Request $request, $id, $pelatihan_id)
    {
        $pelatihan = Pelatihan::find($pelatihan_id);
        $pelatihan->karyawan_id = $id;
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->penyelenggara_pelatihan = $request->penyelenggara_pelatihan;
        $pelatihan->tanggal_pelatihan = $request->tanggal_pelatihan;
        $pelatihan->deskripsi = $request->deskripsi;
        
        $pelatihan->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil diupdate');
    }

    
    public function pelatihandelete($id, $pelatihan_id)
    {
        $pelatihan = Pelatihan::find($pelatihan_id);
        $pelatihan->delete();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil dihapus');
    }

    
    public function penghargaanstore(Request $request, $id)
    {
        $penghargaan = new Penghargaan();
        $penghargaan->karyawan_id = $id;
        $penghargaan->nama_penghargaan = $request->nama_penghargaan;
        $penghargaan->tanggal_penghargaan = $request->tanggal_penghargaan;
        $penghargaan->deskripsi_penghargaan = $request->deskripsi_penghargaan;
        
        $penghargaan->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }

    
    public function penghargaandelete($id, $penghargaan_id)
    {
        $penghargaan = Penghargaan::find($penghargaan_id);
        $penghargaan->delete();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil dihapus');
    }


    public function keahlianstore(Request $request, $id)
    {
        $keahlian = new Keahlian();
        $keahlian->karyawan_id = $id;
        $keahlian->nama_keahlian = $request->nama_keahlian;
        $keahlian->tingkat_keahlian = $request->tingkat_keahlian;
        
        $keahlian->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }

    
    public function keahlianupdate(Request $request, $id, $keahlian_id)
    {
        $keahlian = Keahlian::find($keahlian_id);
        $keahlian->karyawan_id = $id;
        $keahlian->nama_keahlian = $request->nama_keahlian;
        $keahlian->tingkat_keahlian = $request->tingkat_keahlian;
        
        $keahlian->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil diupdate');
    }

    public function keahliandelete($id, $keahlian_id)
    {
        $keahlian = Keahlian::find($keahlian_id);
        $keahlian->delete();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil dihapus');
    }

    
    public function pengalamankerjastore(Request $request, $id)
    {
        $pengalamankerja = new Pengalamankerja();
        $pengalamankerja->karyawan_id = $id;
        $pengalamankerja->nama_perusahaan = $request->nama_perusahaan;
        $pengalamankerja->jabatan = $request->jabatan;
        $pengalamankerja->tanggal_mulai = $request->tanggal_mulai;
        $pengalamankerja->tanggal_selesai = $request->tanggal_selesai;
        $pengalamankerja->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        
        $pengalamankerja->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil ditambahkan');
    }

    
    public function pengalamankerjaupdate(Request $request, $id, $pengalamankerja_id)
    {
        $pengalamankerja = Pengalamankerja::find($pengalamankerja_id);
        $pengalamankerja->karyawan_id = $id;
        $pengalamankerja->nama_perusahaan = $request->nama_perusahaan;
        $pengalamankerja->jabatan = $request->jabatan;
        $pengalamankerja->tanggal_mulai = $request->tanggal_mulai;
        $pengalamankerja->tanggal_selesai = $request->tanggal_selesai;
        $pengalamankerja->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        
        $pengalamankerja->save();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil diupdate');
    }

    
    public function pengalamankerjadelete($id, $pengalamankerja_id)
    {
        $pengalamankerja = Pengalamankerja::find($pengalamankerja_id);
        $pengalamankerja->delete();
        return redirect()->route('karyawan.profil', $id)->with('success', 'Data berhasil dihapus');
    }

    
    




   
}
