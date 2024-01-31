<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Models\Kategori_buku;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori_buku::all();
        return view('admin.crud_kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kategori'=>'required',
        ],[
            'nama_kategori.required'=>'Nama Kategori Wajib Diisi',
        ]);

        // Cek apakah kategori sudah ada?
        $data = Kategori_buku::where('nama_kategori', $request->nama_kategori)->first();
        if ($data) {
            return redirect()->route('kategori.index');
        }

        $kategori_buku = [
            'nama_kategori' => $request->input('nama_kategori'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Kategori_buku::insert($kategori_buku);

        return redirect()->route('kategori.index');
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
        $request->validate([
            'nama_kategori'=>'required',
        ],[
            'nama_kategori.required'=>'Nama Kategori Wajib Diisi',
        ]);

        // Cek apakah kategori sudah ada?
        $data = Kategori_buku::where('nama_kategori', $request->nama_kategori)->first();
        if ($data) {
            return redirect()->route('kategori.index');
        }

        $kategori_buku = [
            'nama_kategori' => $request->input('nama_kategori'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Kategori_buku::where('id', $id )->update($kategori_buku);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori_buku::where('id', $id)->delete();
        return redirect()->route('kategori.index');
    }
}
