<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index()
    {
        $KategoriSurat = KategoriSurat::all();
        return response()->json($KategoriSurat);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_tugas' => 'required',
            'tenggat_waktu' => 'required',
            'deskripsi' => 'required',
            'status'    => 'required'
        ]);

        $KategoriSurat = KategoriSurat::create($request->all());

        return response()->json([
            'message' => 'Kategori Surat Berhasil Dibuat',
            'data' => $KategoriSurat
        ], 201);
    }

    public function show($id)
    {
        $KategoriSurat = KategoriSurat::findOrFail($id);
        return response()->json($KategoriSurat);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_tugas' => 'required',
            'tenggat_waktu' => 'required',
            'deskripsi' => 'required',
            'status'    => 'required'
        ]);

        $KategoriSurat = KategoriSurat::findOrFail($id);
        $KategoriSurat->update($request->all());

        return response()->json([
            'message' => 'Kategori Surat Berhasil Diupdate',
            'data' => $KategoriSurat
        ], 200);
    }

    public function destroy($id)
    {
        $KategoriSurat = KategoriSurat::findOrFail($id);
        $KategoriSurat->delete();

        return response()->json([
            'message' => 'Kategori Surat Berhasil Dihapus'
        ], 200);
    }
}
