<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function DaftarDivisi()
    {
        $divisi = DB::table('d_divisi')
                ->where('status', '1')
                ->get();
        return view('pages.manajemen-app.daftardivisi', ['divisi' => $divisi]);
    }

    public function SimpanDivisi(Request $request)
    {
        $ambil_no = DB::table('d_divisi')
                    ->max('kd_divisi');

        $no_awal = (int) substr($ambil_no, 3, 3);
        $no_awal ++;
        $kode_divisi = "DVS";
        $no_divisi = $kode_divisi . sprintf("%03s", $no_awal);

        DB::table('d_divisi')
        ->insert([
            'kd_divisi' => $no_divisi,
            'nm_divisi' => $request->nm_divisi,
            'status'    => "1"
        ]);
        
        return redirect()->back();
    }

    public function DeleteDivisi(Request $request, $kd_divisi)
    {
        DB::table('d_divisi')
            ->where('kd_divisi', $kd_divisi)
            ->update([
                'status' => "0"
            ]);
        
        return redirect()->back();
    }

    public function DaftarJabatan()
    {
        $jabatan = DB::table('d_jabatan')
                ->where('status', '1')
                ->get();
        return view('pages.manajemen-app.daftarjabatan', ['jabatan' => $jabatan]);
    }

    public function SimpanJabatan(Request $request)
    {
        $ambil_no = DB::table('d_jabatan')
                    ->max('kd_jabatan');

        $no_awal = (int) substr($ambil_no, 3, 3);
        $no_awal ++;
        $kode_jabatan = "JBT";
        $no_jabatan = $kode_jabatan . sprintf("%03s", $no_awal);

        DB::table('d_jabatan')
        ->insert([
            'kd_jabatan' => $no_jabatan,
            'nm_jabatan' => $request->nm_jabatan,
            'status'    => "1"
        ]);
        
        return redirect()->back();
    }

    public function DeleteJabatan($kd_jabatan)
    {
        DB::table('d_jabatan')
            ->where('kd_jabatan', $kd_jabatan)
            ->update([
                'status' => "0"
            ]);
        
        return redirect()->back();
    }

    public function DaftarJenisBerkas()
    {
        $jenis_berkas = DB::table('d_jenisberkas')
                ->where('status', '1')
                ->get();
        return view('pages.manajemen-app.daftarjb', ['jenis_berkas' => $jenis_berkas]);
    }

    public function SimpanJenisBerkas(Request $request)
    {
        $ambil_no = DB::table('d_jenisberkas')
                    ->max('kd_jns_berkas');

        $no_awal = (int) substr($ambil_no, 3, 3);
        $no_awal ++;
        $kode_jb = "JB";
        $no_jb = $kode_jb . sprintf("%03s", $no_awal);

        DB::table('d_jenisberkas')
        ->insert([
            'kd_jns_berkas' => $no_jb,
            'nm_jns_berkas' => $request->nm_jabatan,
            'status'    => "1"
        ]);
        
        return redirect()->back();
    }

    public function DeleteJenisBerkas($kd_jns_berkas)
    {
        DB::table('d_jenisberkas')
            ->where('kd_jns_berkas', $kd_jns_berkas)
            ->update([
                'status' => "0"
            ]);
        
        return redirect()->back();
    }
}
