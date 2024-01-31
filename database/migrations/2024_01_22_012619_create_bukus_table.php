<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('sinopsis');
            $table->integer('tahun_terbit');
            $table->integer('jumlah_buku');
            $table->string('cover');
            $table->timestamps();
        });

        // Insert a new buku
       DB::table('bukus')->insert([
           'judul' => 'samira dan samir',
           'penulis' => 'siba shakib',
           'penerbit' => 'cv karya',
           'sinopsis' => 'mengisahka kisah cinta dan perjuangan seorang putra perempuan pak komandan di afganistan',
           'tahun_terbit' => '2024',
           'jumlah_buku' => '5',
           'cover' => 'sds.jpg',
           'created_at' => now(),
           'updated_at' => now(),
       ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
