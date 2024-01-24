<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('user')->group(function(){
    // authenticate
    Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard.user')->middleware('auth');
    Route::get('/login',[UserController::class, 'login'])->name('formlogin_user');
    Route::post('/login/proses',[UserController::class, 'login_proses'])->name('login.proses.user');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout.user');
    Route::get('/register',[UserController::class, 'register'])->name('formregister_user');
    Route::post('/register/proses',[UserController::class, 'register_proses'])->name('register.proses.user');
});


Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard.admin')->middleware('admin');
    Route::get('/login',[AdminController::class, 'login'])->name('formlogin_admin');
    Route::post('/login/proses',[AdminController::class, 'login_proses'])->name('login.proses.admin');
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout.admin');

    
});



Route::prefix('petugas')->group(function(){
    Route::get('/dashboard',[PetugasController::class, 'dashboard'])->name('dashboard.petugas')->middleware('petugas');
    Route::get('/login',[PetugasController::class, 'login'])->name('formlogin_petugas');
    Route::post('/login/proses',[PetugasController::class, 'login_proses'])->name('login.proses.petugas');
    Route::get('/logout',[PetugasController::class, 'logout'])->name('logout.petugas');
    
});
