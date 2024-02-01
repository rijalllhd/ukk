<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;


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
        return view('user.index');
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
        User::insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('formlogin_user');
    }


}
