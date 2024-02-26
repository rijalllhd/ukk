<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','petugas_id','buku_id','kode_peminjaman','tanggal_peminjaman','tanggal_kembali','status',
    ];
    protected $table = 'peminjaman';

    public function buku() 
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
