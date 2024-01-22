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
        Schema::create('kategori_buku_relasis', function (Blueprint $table) {
            $table->id();
            $table->integer('buku_id');
            $table->integer('kategori_id');
            $table->timestamps();
        });

         // Insert a new relasi
       DB::table('kategori_buku_relasis')->insert([
        'buku_id' => '1',
        'kategori_id' => '1',
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_buku_relasis');
    }
};
