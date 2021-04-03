<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function PersonalUser($nip)
    {
        $user = DB::table('pegawai')
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

        return view('pages.userman.datauser', ['user' => $user, 'divisi' => $divisi, 'jabatan' => $jabatan]);
    }

    public function UpdatePersonal(Request $request)
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

        return redirect()->back();
    }

    public function DaftarUser()
    {
        $user = DB::table('users')
                ->join('pegawai', 'pegawai.nip', '=', 'users.nip')
                ->get();

        return view('pages.userman.daftaruser', ['user' => $user]);
    }

    public function EditUser($nip)
    {
        $edit = DB::table('users')
                ->where('nip', $nip)
                ->get();
        
        return view('pages.userman.edituser', ['edit' => $edit]);
    }

    public function UpdateUser(Request $request, $nip)
    {
        if($request->password == "")
        {
            DB::table('users')
                ->where('nip', $nip)
                ->update([
                    'email' => $request->email,
                    'level' => $request->lvl_user
                ]);
        }else if($request->password != "")
        {
            DB::table('users')
                ->where('nip', $nip)
                ->update([
                    'email' => $request->email,
                    'level' => $request->lvl_user,
                    'password' => bcrypt($request->password)
                ]);
        }

        return redirect('/DaftarUser');
    }
}
