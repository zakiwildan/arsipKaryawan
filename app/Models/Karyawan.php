<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public $incrementing = false;
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'nm_pegawai',
        'tmp_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'divisi',
        'jabatan',
        'no_telp'
    ];
}
