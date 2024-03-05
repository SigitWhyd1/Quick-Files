<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSurat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_surat';
    protected $fillable = ['nomor_surat', 'tanggal_masuk', 'tanggal_keluar', 'pengirim', 'penerima', 'status'];
}
