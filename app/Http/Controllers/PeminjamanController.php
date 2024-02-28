<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Str;
use Auth;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjaman::all();
        return view('petugas.crud_peminjaman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Generate kode huruf
        $randomh = strtoupper(Str::random(3));

        // Generate kode angka
        $randoma = mt_rand(1000, 9999);
        
        $randomCode = $randomh . "-" . $randoma;

        // Periksa apakah kode sudah ada di database
        $existingCode = Peminjaman::where('kode_peminjaman', $randomCode)->exists();

        // Ulangi proses jika kode sudah ada di database
        while ($existingCode) {
            $randomh = strtoupper(Str::random(3));
            $randoma = mt_rand(1000, 9999);
            $randomCode = $randomh . "-" . $randoma;
            $existingCode = Peminjaman::where('kode_peminjaman', $randomCode)->exists();
        }

        // insert buku
        $peminjaman = [
            'user_id' => $request->input('user_id'),
            'buku_id' => $request->input('buku_id'),
            'kode_peminjaman' => $randomCode,
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'tanggal_kembali' => Carbon::parse($request->input('tanggal_peminjaman'))->addWeek(),
            'status' => "P",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $cekpinjam = Peminjaman::where('user_id', Auth::user()->id)->where('buku_id', $request->input('buku_id'))->first();

        if ($cekpinjam->status == "P") {
            return redirect()->route('history.user')->with('error', 'Buku yang anda pinjam sudah dalam proses antrean!');
        } elseif($cekpinjam->status == "B") {
            return redirect()->route('history.user')->with('error', 'Anda belum bisa eminjam buku karena masi dalam waktu peminjaman');
        } elseif ($cekpinjam->status == "I") {
            return redirect()->route('history.user')->with('error', 'Buku yang ingin anda pinjam sudah diterima admin, silahkan cek dalam antrean!');
        } else {
            Peminjaman::insert($peminjaman);
            return redirect()->route('history.user')->with('success', 'Menunggu buku diverif petugas');
        }

        // dd($peminjaman);
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $peminjaman = [
            'petugas_id' => $request->input('petugas_id'),
            'status' => $request->input('status'),
            'updated_at' => Carbon::now(),
        ];

        if ($request->input('status') == "I") {    
            $buku = Buku::where('id', $request->input('buku_id'))->first();
            $buku->jumlah_buku -= 1;
            $buku->save();
        }

        if ($request->input('status') == "S") {    
            $buku = Buku::where('id', $request->input('buku_id'))->first();
            $buku->jumlah_buku += 1;
            $buku->save();
        }

        Peminjaman::where('id', $id )->update($peminjaman);


        return redirect()->route('crud_peminjaman.petugas')->with('success', 'Status berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
