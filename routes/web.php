<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ManageController;
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
        Route::get('/TambahData', [KaryawanController::class, 'TambahData'])->name('tambahdata');
        Route::post('/InputDataPgw/Simpan', [KaryawanController::class, 'SimpanPegawai'])->name('simpanpegawai');
        Route::get('/InputDataPgw/Edit/{nip}', [KaryawanController::class, 'EditPegawai'])->name('editpegawai');
        Route::post('/InputDataPgw/Update/{nip}', [KaryawanController::class, 'UpdatePegawai'])->name('updatepegawai');
        Route::get('/InputDataPgw/Delete/{nip}', [KaryawanController::class, 'DeletePegawai'])->name('deletepegawai');

        //Export Data
        Route::get('/ExportData', [ExportController::class, 'DaftarExport'])->name('daftarexport');
        Route::get('/ExportData/Export', [ExportController::class, 'ExportData'])->name('exportdata');

        //Userman
        Route::get('/PersonalData/{nip}', [UserController::class, 'PersonalUser'])->name('personaluser');
        Route::post('/EditUser/Update', [UserController::class, 'UpdatePersonal'])->name('updatepersonal');
        Route::get('/DaftarUser', [UserController::class, 'DaftarUser'])->name('daftaruser');

        //manage app
        Route::get('/DaftarJB', [ManageController::class, 'DaftarJB'])->name('daftarjb');
        Route::get('/DaftarDivisi', [ManageController::class, 'DaftarDivisi'])->name('daftardivisi');
        Route::post('/DaftarDivisi/Upload', [ManageController::class, 'SimpanDivisi'])->name('simpandivisi');
        Route::post('/DaftarDivisi/Delete/{kd_divisi}', [ManageController::class, 'DeleteDivisi'])->name('deletedivisi');

        Route::get('/DaftarJabatan', [ManageController::class, 'DaftarJabatan'])->name('daftarjabatan');
        Route::post('/DaftarJabatan/Upload', [ManageController::class, 'SimpanJabatan'])->name('simpanjabatan');
        Route::post('/DaftarJabatan/Delete/{kd_jabatan}', [ManageController::class, 'DeleteJabatan'])->name('deletejabatan');

        Route::get('/DaftarJB', [ManageController::class, 'DaftarJenisBerkas'])->name('daftarjenisberkas');
        Route::post('/DaftarJB/Upload', [ManageController::class, 'SimpanJenisBerkas'])->name('simpanjenisberkas');
        Route::post('/DaftarJB/Delete/{kd_jns_berkas}', [ManageController::class, 'DeleteJenisBerkas'])->name('deletejenisberkas');
});