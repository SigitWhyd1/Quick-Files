<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return response()->json($suratMasuk);
    }

    public function create()
    {
        // Jika Anda ingin menampilkan form pembuatan surat masuk, Anda dapat membuat tampilan (view) khusus untuk ini
        return view('surat_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_masuk' => 'required|date',
            'pengirim' => 'required',
            'tujuan_surat' => 'required',
            'isi_surat' => 'required',
            'kategori_surat' => 'required',
            'status' => 'required'
        ]);

        $suratMasuk = SuratMasuk::create($request->all());

        return response()->json([
            'message' => 'Surat Masuk Berhasil Dibuat',
            'data' => $suratMasuk
        ], 201);
    }

    public function show($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return response()->json($suratMasuk);
    }

    public function edit($id)
    {

        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('surat_masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_masuk' => 'required|date',
            'pengirim' => 'required',
            'tujuan_surat' => 'required',
            'isi_surat' => 'required',
            'kategori_surat' => 'required',
            'status' => 'required'
        ]);

        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->update($request->all());

        return response()->json([
            'message' => 'Surat Masuk Berhasil Diupdate',
            'data' => $suratMasuk
        ], 200);
    }

    public function delete($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->delete();

        return response()->json([
            'message' => 'Surat Masuk Berhasil Dihapus',
            'data' => $suratMasuk
        ], 200);
    }
}
