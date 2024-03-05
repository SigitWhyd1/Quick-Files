<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $Pengguna = Pengguna::all();
        return response()->json($Pengguna);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        $Pengguna = Pengguna::create($request->all());

        return response()->json([
            'message' => 'Pengguna Berhasil Dibuat',
            'data' => $Pengguna
        ], 201);
    }

    public function show($id)
    {
        $Pengguna = Pengguna::findOrFail($id);
        return response()->json($Pengguna);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        $Pengguna = Pengguna::findOrFail($id);
        $Pengguna->update($request->all());

        return response()->json([
            'message' => 'Pengguna Berhasil Diupdate',
            'data' => $Pengguna
        ], 200);
    }

    public function destroy($id)
    {
        $Pengguna = Pengguna::findOrFail($id);
        $Pengguna->delete();

        return response()->json([
            'message' => 'Pengguna Berhasil Dihapus'
        ], 200);
    }
}
