<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return response()->json($suratKeluar);
    }

    public function create()
    {
        // Jika Anda ingin menampilkan form pembuatan surat masuk, Anda dapat membuat tampilan (view) khusus untuk ini
        return view('surat_keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_keluar' => 'required|date',
            'penerima' => 'required',
            'tujuan_surat' => 'required',
            'isi_surat' => 'required',
            'kategori_surat' => 'required',
            'status' => 'required'
        ]);

        $suratKeluar = SuratKeluar::create($request->all());

        return response()->json([
            'message' => 'Surat Keluar Berhasil Dibuat',
            'data' => $suratKeluar
        ], 201);
    }

    public function show($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return response()->json($suratKeluar);
    }

    public function edit($id)
    {
        
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('surat_keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_keluar' => 'required|date',
            'penerima' => 'required',
            'tujuan_surat' => 'required',
            'isi_surat' => 'required',
            'kategori_surat' => 'required',
            'status' => 'required'
        ]);

        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->update($request->all());

        return response()->json([
            'message' => 'Surat Keluar Berhasil Diupdate',
            'data' => $suratKeluar
        ], 200);
    }

    public function delete($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->delete();

        return response()->json([
            'message' => 'Surat Keluar Berhasil Dihapus',
            'data' => $suratKeluar
        ], 200);
    }
}
