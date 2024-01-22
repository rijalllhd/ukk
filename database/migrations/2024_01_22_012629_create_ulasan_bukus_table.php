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
        Schema::create('ulasan_bukus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('buku_id');
            $table->string('ulasan');
            $table->integer('rating');
            $table->timestamps();
        });

        // Insert a new ulasan
       DB::table('ulasan_bukus')->insert([
        'user_id' => '1',
        'buku_id' => '1',
        'ulasan' => 'buku yan sangat bagus',
        'rating' => '4',
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_bukus');
    }
};
