<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Carbon\carbon;

class AdminController extends Controller
{
    public function login() {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.admin');
        } else {
            return view('admin.login.login');   
        }
    }

    public function dashboard() {
        return view('admin.index');
    }

    public function login_proses(Request $request){
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['username'=>$check['username'], 'password'=>$check['password']])) {
            session()->regenerate();
            return redirect()->route('dashboard.admin');
        } else {
            return back();
        }
    }

    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('formlogin_admin');
    }
}
