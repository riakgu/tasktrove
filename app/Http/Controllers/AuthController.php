<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        $data = [
            'title' => 'Login'
        ];

        return view('auth.login', $data);
    }

    public function doLogin(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'Login success!' );
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.'
        ]);
    }
}
