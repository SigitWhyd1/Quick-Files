<?php

namespace App\Http\Controllers;

use App\Models\DataKategori;
use Illuminate\Http\Request;
use App\Models\KategoriSurat;

class DataKategoriController extends Controller
{
    public function index()
    {
        $DataKategori = DataKategori::all();
        return response()->json($DataKategori);
    }

    public function create()
    {
        return view('data_kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kategori' => 'required|unique:data_kategori|max:255',
            'deskripsi' => 'required'
        ]);

        DataKategori::create($request->all());

        return redirect()->route('data_kategori.index')->with('success', 'data kategori berhasil disimpan.');
    }

    public function edit(DataKategori $dataKategori)
    {
        return view('data_kategori.edit', compact('dataKategori'));
    }

    public function update(Request $request, DataKategori $dataKategori)
    {
        $request->validate([
            'jenis_kategori' => 'required|unique:data_kategori|max:255',
            'deskripsi' => 'required'
        ]);

        $dataKategori->update($request->all());

        return redirect()->route('data_kategori.index')->with('success', 'data kategori berhasil diperbarui.');
    }

    public function destroy(DataKategori $DataKategori)
    {
        $DataKategori->delete();

        return redirect()->route('data_kategori.index')->with('success', 'data kategori berhasil dihapus.');
    }
}

