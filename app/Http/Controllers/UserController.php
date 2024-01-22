<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
            return redirect()->route('dashboard.user');
        } else {
            return back();
        }
    }

    public function Logout(){
        Auth::logout();
        return view('welcome');
    }
}
