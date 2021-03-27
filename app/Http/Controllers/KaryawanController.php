<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function DataPegawai()
    {
        $pegawai = DB::table('pegawai')
                    ->join('users', 'users.nip', '=', 'pegawai.nip')
                    ->where('users.level', '!=', 'Admin')
                    ->get();
        return view('pages.karyawan.datapegawai', ['pegawai' => $pegawai]);
    }
}
