<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use Auth;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function login() {
        if (Auth::guard('petugas')->check()) {
            return redirect()->route('dashboard.petugas');
        } else {
            return view('petugas.login.login');   
        }
    }

    public function dashboard() {
        return view('petugas.index');
    }

    public function login_proses(Request $request){
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('petugas')->attempt(['email'=>$check['email'], 'password'=>$check['password']])) {
            session()->regenerate();
            return redirect()->route('dashboard.petugas')->with('success', 'Anda berhasil login.');
        } else {
            return back()->with('error', 'Username atau Password Anda Salah');
        }
    }

    public function Logout(){
        Auth::guard('petugas')->logout();
        return redirect()->route('formlogin_petugas');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Petugas::all();
        return view('admin.crud_petugas.index', compact('data'));
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
            'username'=>'required',
            'email'=>'required|email|unique:petugas,email',
            'password'=>'required|min:8',
            'nama_lengkap'=>'required',
            'alamat'=>'required',
        ],[
            'username.required'=>'Username Wajib Diisi',
            'email.required'=>'Email Wajib Diisi',
            'email.unique'=>'Email Sudah Terdaftar',
            'password.required'=>'Password Wajib Diisi',
            'password.min'=>'Password Minimal 8 Karakter',
            'nama_lengkap.required'=>'Nama Lengkap Wajib Diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
        ]);

        // Cek apakah petugas sudah ada?
        $data = Petugas::where('email', $request->email)->first();
        if ($data) {
            return redirect()->route('petugas.index');
        }

        $petugas = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'alamat' => $request->input('alamat'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Petugas::insert($petugas);

        return redirect()->route('petugas.index');
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
            'username'=>'required',
            'email'=>'required|email|unique:petugas,email',
            'password'=>'required|min:8',
            'nama_lengkap'=>'required',
            'alamat'=>'required',
        ],[
            'username.required'=>'Username Wajib Diisi',
            'email.required'=>'Email Wajib Diisi',
            'email.unique'=>'Email Sudah Terdaftar',
            'password.required'=>'Password Wajib Diisi',
            'password.min'=>'Password Minimal 8 Karakter',
            'nama_lengkap.required'=>'Nama Lengkap Wajib Diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
        ]);

        // Cek apakah petugas sudah ada?
        $data = Petugas::where('email', $request->email)->first();
        if ($data) {
            return redirect()->route('petugas.index');
        }

        $petugas = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'alamat' => $request->input('alamat'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'updated_at' => Carbon::now(),
        ];

        Petugas::where('id', $id)->update($petugas);

        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Petugas::where('id', $id)->delete();
        return redirect()->route('petugas.index');
    }
}
