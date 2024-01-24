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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
