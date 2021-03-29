<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    // use HasFactory;
    public $incrementing = false;
    protected $table = 'berkas_pegawai';
    protected $fillable = [
        'nip',
        'nm_berkas',
        'jns_berkas',
        'tgl_upload',
        'stts_berkas',
        'keterangan'    
    ];
}
