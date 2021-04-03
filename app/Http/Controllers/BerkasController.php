<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerkasController extends Controller
{
    public function DaftarBerkas($nip)
    {
        $berkas = DB::table('berkas_pegawai')
                    ->where('nip', $nip)
                    ->get();
        
        return view('pages.karyawan.daftarberkas', ['berkas' => $berkas]);
    }

    public function DeleteBerkas($id)
    {
        DB::table('berkas_pegawai')
                ->where('id', $id)
                ->delete();
        return redirect()->back();
    }
}
