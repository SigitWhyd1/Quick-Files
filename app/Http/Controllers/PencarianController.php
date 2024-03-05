<?php

namespace App\Http\Controllers;

use App\Models\Pencarian;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index()
    {
        $Pencarian = Pencarian::all();
        return response()->json($Pencarian);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kata_kunci' => 'required',
            'tanggal' => 'required',
        ]);

        $Pencarian = Pencarian::create($request->all());

        return response()->json([
            'message' => 'Pencarian Berhasil Dibuat',
            'data' => $Pencarian
        ], 201);
    }

    public function show($id)
    {
        $Pencarian = Pencarian::findOrFail($id);
        return response()->json($Pencarian);
    }
}
