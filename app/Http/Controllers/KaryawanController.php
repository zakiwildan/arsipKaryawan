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

    public function EditPegawai($nip)
    {
        $editPegawai = Karyawan::find($nip);
        return view('pages.karyawan.editpegawai', ['editPegawai' => $editPegawai]);
    }

    public function UpdatePegawai(Request $request)
    {
        DB::table('pegawai')
                ->where('pegawai.nip', '=', $request->nip)
                ->update([
                    'nm_pegawai' => $request->nm_pegawai,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'jk' => $request->jk,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'divisi' => $request->divisi,
                    'jabatan' => $request->jabatan,
                    'no_telp' => $request->no_telp
                ]);

        return redirect('/DataPegawai');
    }
}
