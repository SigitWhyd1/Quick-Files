<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKategori extends Model
{
    use HasFactory;

    protected $table = 'data_kategori';
    protected $fillable = ['jenis_kategori', 'deskripsi'];
}
