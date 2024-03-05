<?php

namespace App\Http\Controllers;

use App\Models\ManajemenTugas;
use Illuminate\Http\Request;

class ManajemenTugasController extends Controller
{
    public function index()
    {
        $ManajemenTugas = ManajemenTugas::all();
        return response()->json($ManajemenTugas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_tugas' => 'required',
            'tenggat_waktu' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        $ManajemenTugas = ManajemenTugas::create($request->all());

        return response()->json([
            'message' => 'Manajemen Tugas Berhasil Dibuat',
            'data' => $ManajemenTugas
        ], 201);
    }

    public function show($id)
    {
        $ManajemenTugas = ManajemenTugas::findOrFail($id);
        return response()->json($ManajemenTugas);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_tugas' => 'required',
            'tenggat_waktu' => 'required',
            'deskripsi' => '',
            'status' => 'required'
        ]);

        $ManajemenTugas = ManajemenTugas::findOrFail($id);
        $ManajemenTugas->update($request->all());

        return response()->json([
            'message' => 'Manajemen Tugas Berhasil Diupdate',
            'data' => $ManajemenTugas
        ], 200);
    }

    public function destroy($id)
    {
        $ManajemenTugas = ManajemenTugas::findOrFail($id);
        $ManajemenTugas->delete();

        return response()->json([
            'message' => 'Manajemen Tugas Berhasil Dihapus'
        ], 200);
    }
}
