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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->timestamps();
        });

        // Hash the password before storing it
        $hashedPassword = Hash::make('petugas123');

        // Insert a new petugas
       DB::table('petugas')->insert([
           'username' => 'petugas',
           'email' => 'petugas@gmail.com',
           'password' => $hashedPassword,
           'nama_lengkap' => 'petugas hadi',
           'alamat' => 'parung dengdek',
           'created_at' => now(),
           'updated_at' => now(),
       ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
