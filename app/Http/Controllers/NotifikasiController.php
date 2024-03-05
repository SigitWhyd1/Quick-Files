<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $Notifikasi = Notifikasi::all();
        return response()->json($Notifikasi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_notifikasi' => 'required',
            'isi_notifikasi' => 'required',
            'waktu_notifikasi' => 'required',
            'status' => 'required'
        ]);

        $Notifikasi = Notifikasi::create($request->all());

        return response()->json([
            'message' => 'Notifikasi Berhasil Dibuat',
            'data' => $Notifikasi
        ], 201);
    }

    public function show($id)
    {
        $Notifikasi = Notifikasi::findOrFail($id);
        return response()->json($Notifikasi);
    }
}