<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Home()
    {
        $pegawai = Karyawan::all();
        $berkas = Berkas::all();
        $berkasverif = DB::table('berkas_pegawai')
                        ->join('pegawai', 'pegawai.nip', '=', 'berkas_pegawai.nip')
                        ->where('stts_berkas', '!=', 'Dalam Verifikasi')
                        ->get();
        $berkasbelum = DB::table('berkas_pegawai')
                        ->join('pegawai', 'pegawai.nip', '=', 'berkas_pegawai.nip')
                        ->join('d_jenisberkas', 'd_jenisberkas.kd_jns_berkas', '=', 'berkas_pegawai.jns_berkas')
                        ->where('stts_berkas', '!=', 'Diterima')
                        ->get();

        return view('index', ['pegawai' => $pegawai,'berkas' => $berkas, 'berkasverif' => $berkasverif, 'berkasbelum' => $berkasbelum]);
    }
}
