<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KaryawanExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class ExportController extends Controller
{
    public function DaftarExport()
    {
        $pegawai = DB::table('pegawai')
                    ->select('nip', 'nm_pegawai', 'tgl_lahir', 'divisi', 'jabatan')
                    ->get();
        return view('pages.karyawan.exportpegawai', ['pegawai' => $pegawai]);
    }

    public function ExportData()
    {
        return Excel::download(new KaryawanExport, 'users.xlsx');
    }
}
