<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
    return view('login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required'=> 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'customer'){
                return redirect('admin/customer');
            }elseif (Auth::user()->role == 'admin') {
                return redirect('admin/admin');
            }elseif (Auth::user()->role == 'owner'){
                return redirect('admin/owner');
            }
        }else{
            return redirect('')->withErrors('Username dan Password yang dimasukan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
