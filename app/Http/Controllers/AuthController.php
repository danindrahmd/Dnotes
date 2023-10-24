<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect('/dashboard')->with('success', 'Login successful!');
        }

        // Jika autentikasi gagal
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Menampilkan halaman registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Memproses registrasi
    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Debugging
        \Log::info('Registrasi Baru', ['data' => $request->all()]);

        try {
            // Proses registrasi
            $user = \App\Models\User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            // Debugging
            \Log::info('Registrasi Baru Berhasil', ['user_id' => $user->id]);

            // Jika registrasi berhasil
            return redirect()->route('login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menyimpan
            \Log::error('Gagal menyimpan data registrasi', ['error' => $e->getMessage()]);
            return back()->withErrors(['email' => 'Registration failed'])->withInput();
        }
    }

    // Logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
