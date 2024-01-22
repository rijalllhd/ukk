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
            $table->integer('tahun_terbit');
            $table->timestamps();
        });

        // Insert a new buku
       DB::table('bukus')->insert([
           'judul' => 'samira dan samir',
           'penulis' => 'siba shakib',
           'penerbit' => 'cv karya',
           'tahun_terbit' => '2024',
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
