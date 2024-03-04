<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = ['nomor_surat', 'tanggal_keluar', 'penerima', 'isi_surat', 'perihal', 'kategori_surat', 'status'];
    protected $table = 'surat_keluar';
}
