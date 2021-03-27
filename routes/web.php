<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'Login'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');

Route::group(['middleware' => ['auth']], function(){
        Route::get('/Home', [HomeController::class, 'Home'])->name('home');
        Route::get('/Logout', [LoginController::class, 'Logout'])->name('logout');

        //Karyawan
        Route::get('/DataPegawai', [KaryawanController::class, 'DataPegawai'])->name('datapegawai');
});