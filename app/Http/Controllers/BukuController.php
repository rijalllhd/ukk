<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Models\Buku;
use App\Models\Kategori_buku;
use App\Models\Kategori_buku_relasi;
use Illuminate\Support\Facades\File;


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

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sinopsis' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_buku' => 'required|integer',
            'cover' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
        ],[
            'judul.required'=>'Judul Wajib Diisi',
            'penulis.required'=>'Penulis Wajib Diisi',
            'sinopsis.required'=>'Sinopsis Wajib Diisi',
            'tahun_terbit.required'=>'Tahun terbit Wajib Diisi',
            'jumlah_buku.required'=>'Jumlah buku Wajib Diisi',
            'cover.required'=>'Cover Wajib Diupload',
            'cover.mimes'=>'Jenis File Harus Jpg, Jpeg, Png, atau Webp',
            'cover.max'=>'Jenis File Terlalu Besar (max:2mb)',
        ]);

        
        // dd($request->all());

        // cover
        if ($request->has('cover')) {
            $file =$request->file('cover');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = 'upload/cover/';
            $file->move($path, $filename);
        }

        // insert buku
        $buku = [
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'sinopsis' => $request->input('sinopsis'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'cover' => $path.$filename,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        Buku::insert($buku);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambah');
    }

    public function kategori_add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'buku_id' => 'required',
            'kategori_id' => 'required',
        ],[
            'buku_id.required'=>'Buku Wajib Diisi',
            'kategori_id.required'=>'Kategori Wajib Diisi',
        ]);

        // Cek apakah relasi sudah ada?
        $data = Kategori_buku_relasi::where('kategori_id', $request->kategori_id)->where('buku_id', $request->buku_id)->first();
        if ($data) {
            return redirect()->route('buku.index')->with('error', 'Kategori telah tersedia di buku tersebut');
        }

        $kategori_buku_relasi = [
            'buku_id' => $request->input('buku_id'),
            'kategori_id' => $request->input('kategori_id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Kategori_buku_relasi::insert($kategori_buku_relasi);

        return redirect()->route('buku.index')->with('success', 'Kategori buku berhasil ditambah');
    }

    public function kategori_delete(Request $request, $id)
    {
        Kategori_buku_relasi::where('id', $id)->delete();
        return redirect()->route('buku.index')->with('error', 'Kategori berhasil dihapus dari buku');
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
            'sinopsis' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_buku' => 'required|integer',
            'cover' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
        ],[
            'judul.required'=>'Judul Wajib Diisi',
            'penulis.required'=>'Penulis Wajib Diisi',
            'sinopsis.required'=>'Sinopsis Wajib Diisi',
            'tahun_terbit.required'=>'Tahun terbit Wajib Diisi',
            'jumlah_buku.required'=>'Jumlah_buku Wajib Diisi',
            'cover.required'=>'Cover Wajib Diupload',
            'cover.mimes'=>'Jenis File Harus Jpg, Jpeg, Png, atau Webp',
            'cover.max'=>'Jenis File Terlalu Besar (max:2mb)',
        ]);
        
        $buku = Buku::where('id', $id)->first();

        // cover
        if ($request->has('cover')) {
            $file =$request->file('cover');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = 'upload/cover/';
            $file->move($path, $filename);

            if (File::exists($buku->cover)) {
                File::delete($buku->cover);
            }
        }

        // insert buku
            $buku->judul = $request->input('judul');
            $buku->penulis = $request->input('penulis');
            $buku->penerbit = $request->input('penerbit');
            $buku->sinopsis = $request->input('sinopsis');
            $buku->tahun_terbit = $request->input('tahun_terbit');
            $buku->jumlah_buku = $request->input('jumlah_buku');
            $buku->cover = $path.$filename;
            $buku->updated_at = Carbon::now();
            $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::where('id', $id)->first();
        if (File::exists($buku->cover)) {
            File::delete($buku->cover);
        }
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
