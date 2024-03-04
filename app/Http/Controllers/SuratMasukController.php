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
        return view('surat_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_masuk' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'isi_surat' => 'required',
            'kategori_surat' => 'required',
            'status' => 'required'
        ]);

        $store = SuratMasuk::create($request->all());

        return response()->json([
            'message' => 'Data created successfully',
            'items' => $store,
            ]);

        //return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil disimpan.');
    }

}
