<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class HomeController extends Controller
{
    public function Home()
    {
        $pegawai = Karyawan::all();
        return view('index', ['pegawai' => $pegawai]);
    }
}
