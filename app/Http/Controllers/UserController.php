<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;
use App\Models\Buku;
use App\Models\Peminjaman;


class UserController extends Controller
{
    public function login() {
        if (Auth::check()) {
            return redirect()->route('dashboard.user');
        } else {
            return view('user.login.login');   
        }
    }

    public function dashboard() {
        // var_dump("Really go here");
        $bukubaru = Buku::orderBy('created_at')->get();
        return view('user.index', compact('bukubaru'));
    }

    public function buku(){
        $bukus = Buku::all();
        return view('user.buku', compact('bukus'));
    }

    public function history(){
        $history = Peminjaman::where('user_id', Auth::user()->id)->get();

        return view('user.history', compact('history'));
    }

    public function login_proses(Request $request) {
        // dd($request->all());   
        $check = $request->all();
        if (Auth::attempt(['email'=> $check['email'], 'password'=>$check['password']])) {
            session()->regenerate();
            return redirect()->route('dashboard.user')->with('success', 'Anda berhasil login.');
        } else {
            return back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('formlogin_user');
    }

    public function register(){
        if (Auth::check()) {
            return redirect()->route('dashboard.user');
        } else { 
            return view('user.login.register');
        }
    }

    public function register_proses(Request $request){
        // dd($request->all());

        // Cek apakah user sudah ada?
        $data = User::where('email', $request->email)->first();
        if ($data) {
            return redirect()->route('login.user')->with('error', 'Email telah tersedia!!');
        }

        User::insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('formlogin_user')->with('success', 'Akun berhasil di registrasi');
    }


   

}
