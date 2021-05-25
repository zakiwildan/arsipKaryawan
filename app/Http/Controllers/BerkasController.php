<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerkasController extends Controller
{
    public function DaftarBerkas($nip)
    {
        $berkas = DB::table('berkas_pegawai')
                    ->select(
                        'berkas_pegawai.id_berkas',
                        'berkas_pegawai.nm_berkas',
                        'd_jenisberkas.nm_jns_berkas',
                        'berkas_pegawai.tgl_upload',
                        'berkas_pegawai.keterangan',
                        'berkas_pegawai.stts_berkas'
                    )
                    ->join('d_jenisberkas', 'd_jenisberkas.kd_jns_berkas', 'berkas_pegawai.jns_berkas')
                    ->where('nip', $nip)
                    ->get();
        
        $jenisberkas = DB::table('d_jenisberkas')
                ->get();
        
        return view('pages.karyawan.daftarberkas', ['berkas' => $berkas, 'jenisberkas' => $jenisberkas]);
    }

    public function DeleteBerkas($id)
    {
        DB::table('berkas_pegawai')
                ->where('id', $id)
                ->delete();
        return redirect()->back();
    }
    
    public function SimpanBerkas(Request $request)
    {
        $file = $request->file('berkas');
    
        $nama_file = time()."_".$file->getClientOriginalName();
    
        $tujuan_upload = 'Uploads/Berkas';
        $file->move($tujuan_upload,$nama_file);
        
        DB::table('berkas_pegawai')
            ->insert([
                'nip'          => auth()->user()->nip,
                'nm_berkas'    => $nama_file,
                'jns_berkas'   => $request->jns_berkas,
                'tgl_upload'   => date('Y-m-d'),
                'stts_berkas'  => "Dalam Verifikasi",
                'keterangan'   => $request->keterangan,
            ]);
    
        return redirect()->back();
    }
}
