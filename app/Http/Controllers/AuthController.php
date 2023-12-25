<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login() {
        $data = [
            'title' => 'Login'
        ];

        // Mengembalikan view login dengan judul halaman
        return view('auth.login', $data);
    }

    /**
     * Memproses login pengguna.
     *
     * @param Request $request Data request dari formulir login.
     * @return RedirectResponse
     */
    public function doLogin(Request $request): RedirectResponse {
        // Validasi email dan password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mencoba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Jika berhasil, regenerasi sesi dan redirect ke dashboard
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'Login success!' );
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.'
        ]);
    }

    /**
     * Menampilkan halaman registrasi.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function register() {
        $data = [
            'title' => 'Register'
        ];

        // Mengembalikan view registrasi dengan judul halaman
        return view('auth.register', $data);
    }

    /**
     * Memproses registrasi pengguna baru.
     *
     * @param Request $request Data request dari formulir registrasi.
     * @return RedirectResponse
     */
    public function doRegister(Request $request): RedirectResponse {
        // Validasi input formulir
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);

        // Hashing password dan membuat pengguna baru
        $validated['password'] = Hash::make($validated['password']);
        User::query()->create($validated);

        // Redirect ke halaman registrasi dengan pesan sukses
        return redirect('/register')->with('success', 'Registration success!' );
    }

    /**
     * Memproses logout pengguna.
     *
     * @param Request $request Data request dari pengguna.
     * @return RedirectResponse
     */
    public function doLogout(Request $request): RedirectResponse
    {
        // Logout pengguna, menghapus dan regenerasi token sesi
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login');
    }
}
