<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KaryawanController extends Controller
{
    public function DataPegawai()
    {
        $pegawai = DB::table('pegawai')
                    ->select('pegawai.nip', 'pegawai.nm_pegawai', 'pegawai.tgl_lahir', 'd_divisi.nm_divisi', 'd_jabatan.nm_jabatan')
                    ->join('users', 'users.nip', '=', 'pegawai.nip')
                    ->join('d_divisi', 'd_divisi.kd_divisi', '=', 'pegawai.divisi')
                    ->join('d_jabatan', 'd_jabatan.kd_jabatan', '=', 'pegawai.jabatan')
                    ->where('users.level', '!=', 'Admin')
                    ->get();
        return view('pages.karyawan.datapegawai', ['pegawai' => $pegawai]);
    }

    public function TambahData(){
        $divisi = DB::table('d_divisi')
                    ->where('status', '1')
                    ->get();

        $jabatan = DB::table('d_jabatan')
                    ->where('status', '1')
                    ->get();

        // $jenisberkas = DB::table('d_jenisberkas')
        //             ->where('status', '1')
        //             ->get();

        return view('pages.karyawan.tambahdata', ['divisi' => $divisi, 'jabatan' => $jabatan]);
    }

    public function SimpanPegawai(Request $request)
    { 
        DB::table('pegawai')
        ->insert([
                'nip'           => $request->nip,
                'nm_pegawai'    => $request->nm_pegawai,
                'tmp_lahir'     => $request->tmp_lahir,
                'tgl_lahir'     => $request->tgl_lahir,
                'jk'            => $request->jk,
                'agama'         => $request->agama,
                'alamat'        => $request->alamat,
                'divisi'        => $request->divisi,
                'jabatan'       => $request->jabatan,
                'no_telp'       => $request->no_telp
        ]);

        DB::table('users')
        ->insert([
                'nip'           =>  $request->nip,
                'level'         =>  "Karyawan",
                'email'         =>  $request->email,
                'password'      =>  bcrypt($request->password),
                'remember_token'=>  Str::random(32)
        ]);

        return redirect()->back();
    }

    public function EditPegawai($nip)
    {
        $editPegawai = DB::table('pegawai')
                    ->select(
                        'pegawai.nip', 
                        'pegawai.nm_pegawai',
                        'pegawai.tmp_lahir', 
                        'pegawai.tgl_lahir', 
                        'pegawai.jk',
                        'pegawai.agama',
                        'pegawai.alamat',
                        'd_divisi.kd_divisi',
                        'd_divisi.nm_divisi',
                        'd_jabatan.kd_jabatan', 
                        'd_jabatan.nm_jabatan',
                        'pegawai.no_telp'
                    )
                    ->join('d_divisi', 'd_divisi.kd_divisi', '=', 'pegawai.divisi')
                    ->join('d_jabatan', 'd_jabatan.kd_jabatan', '=', 'pegawai.jabatan')
                    ->where('pegawai.nip','=', $nip)
                    ->get();
        
        $divisi = DB::table('d_divisi')
                    ->where('status', '1')
                    ->get();

        $jabatan = DB::table('d_jabatan')
                    ->where('status', '1')
                    ->get();

        $berkasPegawai = DB::table('berkas_pegawai')
                    ->select(
                        'berkas_pegawai.id_berkas',
                        'berkas_pegawai.nm_berkas',
                        'd_jenisberkas.nm_jns_berkas',
                        'berkas_pegawai.tgl_upload',
                        'berkas_pegawai.keterangan',
                        'berkas_pegawai.stts_berkas'
                    )
                    ->join('d_jenisberkas','d_jenisberkas.kd_jns_berkas', 'berkas_pegawai.jns_berkas')
                    ->where('berkas_pegawai.nip', $nip)
                    ->get();
                    
        return view('pages.karyawan.editpegawai', ['editPegawai' => $editPegawai, 'divisi' => $divisi, 'jabatan' => $jabatan, 'berkasPegawai' => $berkasPegawai]);
    }

    public function UpdatePegawai(Request $request)
    {
        DB::table('pegawai')
                ->where('pegawai.nip', '=', $request->nip)
                ->update([
                    'nm_pegawai'    => $request->nm_pegawai,
                    'tmp_lahir'     => $request->tmp_lahir,
                    'tgl_lahir'     => $request->tgl_lahir,
                    'jk'            => $request->jk,
                    'agama'         => $request->agama,
                    'alamat'        => $request->alamat,
                    'divisi'        => $request->divisi,
                    'jabatan'       => $request->jabatan,
                    'no_telp'       => $request->no_telp
                ]);

        return redirect('/DataPegawai');
    }

    public function DeletePegawai($nip)
    {
        DB::table('pegawai')
            ->where('nip','=', $nip)
            ->delete();
        
        return redirect('/DataPegawai');
    }
}
