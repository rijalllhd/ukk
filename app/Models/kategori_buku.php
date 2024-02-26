<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_buku extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];
    protected $table = 'kategori_bukus';
    public $timestamps = false;

}
