<?php

namespace App\Http\Controllers;

use App\Models\DataKategori;
use Illuminate\Http\Request;

class DataKategoriController extends Controller
{
    public function index()
    {
        $DataKategori = DataKategori::all();
        return response()->json($DataKategori);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $DataKategori = DataKategori::create($request->all());

        return response()->json([
            'message' => 'Data Kategori Berhasil Dibuat',
            'data' => $DataKategori
        ], 201);
    }

    public function show($id)
    {
        $DataKategori = DataKategori::findOrFail($id);
        return response()->json($DataKategori);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        $DataKategori = DataKategori::findOrFail($id);
        $DataKategori->update($request->all());

        return response()->json([
            'message' => 'Data Kategori Berhasil Diupdate',
            'data' => $DataKategori
        ], 200);
    }

    public function destroy($id)
    {
        $DataKategori = DataKategori::findOrFail($id);
        $DataKategori->delete();

        return response()->json([
            'message' => 'Data Kategori Berhasil Dihapus'
        ], 200);
    }
}
