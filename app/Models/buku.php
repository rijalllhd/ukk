<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul','penulis','penerbit','sinopsis','tahun_terbit','jumlah_buku','cover'
    ];
    protected $table = 'bukus';
    
}
