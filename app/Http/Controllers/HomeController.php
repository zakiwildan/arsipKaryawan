<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Home()
    {
        $pegawai = Karyawan::all();
        $berkasbelum = DB::table('berkas_pegawai')
                        ->join('pegawai', 'pegawai.nip', '=', 'berkas_pegawai.nip')
                        ->where('stts_berkas', '!=', 'Diterima')
                        ->get();
        return view('index', ['pegawai' => $pegawai, 'berkasbelum' => $berkasbelum]);
    }
}
