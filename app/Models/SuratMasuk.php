<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fillable = ['nomor_surat', 'tanggal_masuk', 'pengirim', 'isi_surat', 'perihal', 'kategori_surat', 'status'];
    protected $table = 'surat_masuk';
}
