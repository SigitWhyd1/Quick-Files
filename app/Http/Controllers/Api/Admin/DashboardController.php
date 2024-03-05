<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon; // untuk datetime
use App\Models\User;
use Illuminate\Support\Facades\DB; //untuk query database
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $suratmasuk = SuratMasuk::count();
        $user = User::count();

    //return response json
    return response()->json([
        'success'   => true,
        'message'   => 'Surat Masuk Di Dashboard', 
        'data'      => ['surat_masuk' => $suratmasuk]
    ]);
    }
}