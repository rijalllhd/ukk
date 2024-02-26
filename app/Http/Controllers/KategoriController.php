<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Models\Kategori_buku;
use Auth;

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

    public function indexp()
    {
        $data = Kategori_buku::all();
        return view('petugas.crud_kategori.index', compact('data'));
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
            if (Auth::guard('petugas')->check()) {
                return redirect()->route('crud_kategori.petugas')->with('error', 'Nama kategori telah tersedia!!');
            } else {
                return redirect()->route('kategori.index')->with('error', 'Nama kategori telah tersedia!!');
            }
        }

        $kategori_buku = [
            'nama_kategori' => $request->input('nama_kategori'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Kategori_buku::insert($kategori_buku);

        if (Auth::guard('petugas')->check()) {
            return redirect()->route('crud_kategori.petugas')->with('success', 'Kategori berhasil ditambahkan');
        } else {
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
        }
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
            return redirect()->route('kategori.index')->with('error', 'Nama kategori telah tersedia!!');
        }

        $kategori_buku = [
            'nama_kategori' => $request->input('nama_kategori'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Kategori_buku::where('id', $id )->update($kategori_buku);

        if (Auth::guard('petugas')->check()) {
            return redirect()->route('crud_kategori.petugas')->with('success', 'Nama kategori berhasil di ubah');
        } else {
            return redirect()->route('kategori.index')->with('success', 'Nama kategori berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori_buku::where('id', $id)->delete();

        if (Auth::guard('petugas')->check()) {
            return redirect()->route('crud_kategori.petugas')->with('success', 'Nama kategori berhasil dihapus');
        } else {
            return redirect()->route('kategori.index')->with('success', 'Nama kategori berhasil dihapus');
        }
    }
}
