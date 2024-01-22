<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard.user')->middleware('auth');
    Route::get('/login',[UserController::class, 'login'])->name('formlogin_user');
    Route::post('/login/proses',[UserController::class, 'login_proses'])->name('login.proses.user');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout.user');
});


Route::prefix('admin')->group(function(){

    
});



Route::prefix('petugas')->group(function(){

    
});
