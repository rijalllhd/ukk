<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Petugas;
use Carbon\carbon;

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
            return redirect()->route('dashboard.petugas');
        } else {
            return back();
        }
    }

    public function Logout(){
        Auth::guard('petugas')->logout();
        return redirect()->route('formlogin_petugas');
    }
}
