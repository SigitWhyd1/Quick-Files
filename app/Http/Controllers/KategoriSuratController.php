<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurat;

class KategoriSuratController extends Controller
{
    public function index()
    {
        $kategoriSurat = KategoriSurat::all();
        return response()->json($kategoriSurat);
    }

    public function create()
    {
        return view('kategori_surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_surat|max:255'
        ]);

        KategoriSurat::create($request->all());

        return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil disimpan.');
    }

    public function edit(KategoriSurat $kategoriSurat)
    {
        return view('kategori_surat.edit', compact('kategoriSurat'));
    }

    public function update(Request $request, KategoriSurat $kategoriSurat)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_surat|max:255'
        ]);

        $kategoriSurat->update($request->all());

        return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil diperbarui.');
    }

    public function destroy(KategoriSurat $kategoriSurat)
    {
        $kategoriSurat->delete();

        return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil dihapus.');
    }
}

