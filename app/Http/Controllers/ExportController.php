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
                    ->select('nip', 'nm_pegawai', 'tgl_lahir', 'nm_divisi', 'nm_jabatan')
                    ->join('d_divisi', 'd_divisi.kd_divisi', 'pegawai.divisi')
                    ->join('d_jabatan', 'd_jabatan.kd_jabatan', 'pegawai.jabatan')
                    ->get();
        return view('pages.karyawan.exportpegawai', ['pegawai' => $pegawai]);
    }

    public function ExportData()
    {
        return Excel::download(new KaryawanExport, 'DATA PEGAWAI-'.time().'.xlsx');
    }
}
