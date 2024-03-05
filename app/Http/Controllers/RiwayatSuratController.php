<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatSurat;

class RiwayatSuratController extends Controller
{
    public function index()
    {
        $RiwayatSurat = RiwayatSurat::all();
        return response()->json($RiwayatSurat);
    }

    public function create()
    {
        return view('riwayat_surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
            'pengirim' => 'required',
            'penerima' => 'required',
            'status' => 'required'
        ]);

        $RiwayatSurat = RiwayatSurat::create($request->all());

        return response()->json([
            'message' => 'Riwayat Surat Berhasil Dibuat',
            'data' => $RiwayatSurat
        ], 201);
    }

    public function destroy($id)
    {
        $RiwayatSurat = RiwayatSurat::findOrFail($id);
        $RiwayatSurat->delete();

        return response()->json([
            'message' => 'Riwayat Surat Berhasil dihapus'
        ], 200);
    }
}