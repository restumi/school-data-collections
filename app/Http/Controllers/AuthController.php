<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        };

        return back()->withErrors([
            'email' => 'email atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
