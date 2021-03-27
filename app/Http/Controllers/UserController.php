<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function PersonalUser($nip)
    {
        $user = DB::table('users')
                ->where('nip', '=', $nip)
                ->get();
        
        return view('pages.userman.datauser', ['user', $user]);
    }
}
