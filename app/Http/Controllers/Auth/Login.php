<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login()
    {
        return view('Auth.Login');
    }

    public function loginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $data = [
            "email" => $request->email,
            "password" => $request->password
        ];
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        return back()->withErrors([
            'email' => 'Email or Password not correct Please try again',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
