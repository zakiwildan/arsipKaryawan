<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Home()
    {
        return view('index');
    }

    public function Login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            return redirect('/Home');
        }
    }
}
