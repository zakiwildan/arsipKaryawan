<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KaryawanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('pegawai')
        ->select('nip', 'nm_pegawai', 'tmp_lahir','tgl_lahir', 'jk', 'agama', 'alamat','nm_divisi', 'nm_jabatan', 'no_telp')
        ->join('d_divisi', 'd_divisi.kd_divisi', 'pegawai.divisi')
        ->join('d_jabatan', 'd_jabatan.kd_jabatan', 'pegawai.jabatan')
        ->get();
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama Pegawai',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
            'Divisi',
            'Jabatan',
            'No. Telp'
        ];
    }
}
