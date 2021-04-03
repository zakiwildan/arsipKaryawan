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
}
