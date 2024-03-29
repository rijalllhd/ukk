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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('petugas_id')->nullable();
            $table->integer('buku_id');
            $table->string('kode_peminjaman')->unique();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali');
            $table->enum('status', ['P','I','T','S','B']);
            $table->timestamps();
        });

         // Insert a new pemminjaman
       DB::table('peminjaman')->insert([
        'user_id' => '1',
        'petugas_id' => '1',
        'buku_id' => '1',
        'kode_peminjaman' => 'TDR-400',
        'tanggal_peminjaman' => '2024-1-14',
        'tanggal_kembali' => '2024-1-31',
        'status' => 'P',
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
