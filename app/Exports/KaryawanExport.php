<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KaryawanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('pegawai')
        ->select('nip', 'nm_pegawai', 'tgl_lahir', 'divisi', 'jabatan')
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
