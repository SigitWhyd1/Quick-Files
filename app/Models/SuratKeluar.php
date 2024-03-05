<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = ['nomor_surat', 'tanggal_keluar', 'penerima', 'isi_surat', 'tujuan_surat', 'kategori_surat', 'status'];
    protected $table = 'surat_keluar';
}
