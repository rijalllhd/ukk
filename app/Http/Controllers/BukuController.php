<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Models\Buku;
use App\Models\Kategori_buku;
use App\Models\Kategori_buku_relasi;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all();
        $kategori_buku = Kategori_buku::all();
        $kategori_buku_relasi = Kategori_buku_relasi::all();
        return view('admin.crud_buku.index', compact('data','kategori_buku','kategori_buku_relasi'));
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
        // dd($request->all());

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_buku' => 'required|integer',
            'cover' => 'required',
        ]);

        // insert buku
        $buku = [
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'cover' => $request->input('cover'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        Buku::insert($buku);
        return redirect()->route('buku.index');
    }

    public function kategori_add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'buku_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $kategori_buku_relasi = [
            'buku_id' => $request->input('buku_id'),
            'kategori_id' => $request->input('kategori_id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Kategori_buku_relasi::insert($kategori_buku_relasi);

        return redirect()->route('buku.index');
    }

    public function kategori_delete(Request $request, $id)
    {
        Kategori_buku_relasi::where('id', $id)->delete();
        return redirect()->route('buku.index');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_buku' => 'required|integer',
            'cover' => 'required',
        ]);

        // insert buku
        $buku = [
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'cover' => $request->input('cover'),
            'updated_at' => Carbon::now(),
        ];
        Buku::where('id', $id)->update($buku);
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::where('id', $id)->delete();
        return redirect()->route('buku.index');
    }
}
