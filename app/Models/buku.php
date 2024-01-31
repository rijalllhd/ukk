<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
    ];
    protected $table = 'bukus';
    
    public function kategori_buku_relasi()
    {
        return $this->hasMany(Kategori_buku_relasi::class);
    }
}
