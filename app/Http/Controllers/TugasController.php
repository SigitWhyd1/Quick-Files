<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $Tugas = Tugas::all();
        return response()->json($Tugas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ]);

        $Tugas = Tugas::create($request->all());

        return response()->json([
            'message' => 'Tugas Berhasil Dibuat',
            'data' => $Tugas
        ], 201);
    }

    public function show($id)
    {
        $Tugas = Tugas::findOrFail($id);
        return response()->json($Tugas);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ]);

        $Tugas = Tugas::findOrFail($id);
        $Tugas->update($request->all());

        return response()->json([
            'message' => 'Tugas Berhasil Diupdate',
            'data' => $Tugas
        ], 200);
    }

    public function destroy($id)
    {
        $Tugas = Tugas::findOrFail($id);
        $Tugas->delete();

        return response()->json([
            'message' => 'Tugas Berhasil Dihapus'
        ], 200);
    }
}