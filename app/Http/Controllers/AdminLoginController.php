<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     */
    public function showLogin()
    {
        return view('admin.login');
    }


    /**
     * Memproses login admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ], [
            'name.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Coba melakukan autentikasi
        |--------------------------------------------------------------------------
        */

        if (Auth::attempt([
            'name' => $credentials['name'],
            'password' => $credentials['password'],
        ])) {

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard
            return redirect()->route('admin.dashboard');
        }


        /*
        |--------------------------------------------------------------------------
        | Login gagal
        |--------------------------------------------------------------------------
        */

        return back()
            ->withErrors([
                'name' => 'Username atau password salah.',
            ])
            ->onlyInput('name');
    }


    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session
        $request->session()->invalidate();

        // Buat CSRF token baru
        $request->session()->regenerateToken();

        // Kembali ke halaman login
        return redirect()->route('index');
    }
}