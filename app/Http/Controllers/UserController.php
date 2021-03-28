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
        // $user = DB::table('users')
        //         ->where('nip', '=', $nip)
        //         ->get();
        
        // return view('pages.userman.datauser', ['user', $user]);

        $user = User::join('pegawai', 'pegawai.nip', '=', 'users.nip')
                ->where('users.nip', '=', $nip)
                ->get();
        return view('pages.userman.datauser', ['user' => $user]);
    }

    public function EditUser(Request $request)
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

        DB::table('users')
                ->where('users.nip', '=', $request->nip)
                ->update([
                    'email'         => $request->email
                ]);

        return redirect('/Home');
    }
}
