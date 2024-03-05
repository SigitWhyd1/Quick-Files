<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenTugas extends Model
{
    use HasFactory;

    protected $table = 'manajemen_tugas';
    protected $fillable = ['judul_tugas', 'tenggat_waktu', 'deskripsi', 'status'];
}
