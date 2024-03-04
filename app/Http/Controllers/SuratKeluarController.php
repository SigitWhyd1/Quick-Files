<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return response()->json($suratKeluar);
    }

    public function create()
    {
        return view('surat_keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_keluar' => 'required|date',
            'penerima' => 'required',
            'perihal' => 'required',
            'isi_surat' => 'required',
            'kategori_surat' => 'required',
            'status' => 'required'
        ]);

        $store = SuratKeluar::create($request->all());

        return response()->json([
            'message' => 'Data created successfully',
            'items' => $store,
            ]);

        //return redirect()->route('surat-keluar.index')->with('success', 'Surat masuk berhasil disimpan.');
    }
}
