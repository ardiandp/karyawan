<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BpjsController extends Controller
{
    //
    
    public function index()
    {
        // Mengambil data dari API menggunakan HTTP Client Laravel
        $response = Http::get('http://laraveltagihan.test/api/bpjs');

        // Memeriksa apakah permintaan berhasil
        if ($response->successful()) {
            $data = $response->json(); // Mengambil data dalam bentuk array

            // Ambil data yang ada di dalam key 'data'
            $bpjsData = $data['data']; // Data BPJS yang sebenarnya
            
            return view('master.bpjs.index', compact('bpjsData')); // Mengirim data ke view
        } else {
            // Jika ada kesalahan, tampilkan pesan error
            return view('master.bpjs.index', ['error' => 'Failed to fetch data from API.']);
        }
    }

    public function create()
    {
        return view('master.bpjs.create');
    }

    public function store(Request $request)
    {
        $response = Http::post('http://laraveltagihan.test/api/bpjs/store', $request->all());

        if ($response->successful()) {
            return redirect()->route('bpjs.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return back()->withErrors($response->json())->withInput();
        }

    }

    public function edit($id)   
    {
        $response = json_decode(file_get_contents('http://laraveltagihan.test/api/bpjs'), true);
        return view('master.bpjs.edit', ['data' => $response['data']]);
    }

    public function update(Request $request, $id)
    {
        $response = json_decode(file_get_contents('http://laraveltagihan.test/api/bpjs'), true);
        return $response;
    }

    public function delete($id)
    {
        $response = Http::get('http://laraveltagihan.test/api/bpjs/delete/' . $id);

        if ($response->successful()) {
            return redirect()->route('bpjs.index')->with('success', 'Data berhasil dihapus');
        } else {
            return back()->withErrors($response->json())->withInput();
        }
    }

}
