<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return redirect('/login');
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

    public function registrasi()
    {
        return view('pengguna.registrasi');
    }

    public function simpanregistrasi(Request $request)
    {
       User::create([
        'name' => $request->name,
        'level' => 'user',
        'email' => $request->email,
        'password' => bcrypt($request->password),
       ]);

       return view('pengguna.login');
    }
}
