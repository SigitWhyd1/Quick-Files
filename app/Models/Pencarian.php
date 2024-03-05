<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencarian extends Model
{
    use HasFactory;

    protected $table = 'pencarian';
    protected $fillable = ['kata_kunci', 'tanggal'];
}
