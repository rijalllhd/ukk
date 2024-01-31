<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_buku_relasi extends Model
{
    use HasFactory;

    protected $fillable = ['id_buku', 'id_kategori'];
    protected $table = 'kategori_buku_relasis';
    public $timestamps = false;

    public function kategori_buku() 
    {
        return $this->belongsTo(kategori_buku::class, 'kategori_id', 'id');
    }
}
