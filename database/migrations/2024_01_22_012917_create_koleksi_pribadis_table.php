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
        Schema::create('koleksi_pribadis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('buku_id');
            $table->timestamps();
        });

         // Insert a new koleksi
       DB::table('koleksi_pribadis')->insert([
        'user_id' => '1',
        'buku_id' => '1',
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksi_pribadis');
    }
};
