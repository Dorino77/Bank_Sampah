<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration process
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        User::create($validatedData);

        return redirect()->route('home')->with('message', 'Berhasil Mendaftar.');
    }






    public function registratioAdminnForm()
    {
        return view('auth.register-admin');
    }
    public function daftar(Request $request)
    {
        $validatedData = $request->validate([
            'telepon' => 'required|string|min:10',
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the admin
        Admin::create($validatedData);

        return redirect()->route('home')->with('message', 'Berhasil Mendaftar.');
    }


    // Show the login form
    public function showLoginForm()
    {
        return view('home');
    }

    // Handle login process
    public function login(Request $request)
    {
        $request->validate([
            'telepon' => 'required',
            'password' => 'required',
        ]);
         // Jika login sebagai Admin gagal, coba login sebagai User
        if (Auth::guard('web')->attempt($request->only('telepon', 'password'))) {
            return redirect()->route('user.index');
        }
        if (Auth::guard('admin')->attempt($request->only('telepon', 'password'))) {
            return redirect()->route('admin.index');
        }

        session()->flash('error', 'Nomor Telepon atau Password salah.');
        return back();
    }

    // Handle logout
    public function logout(Request $request)
{
    Auth::logout();

    // Hapus semua sesi
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('message', 'Anda telah berhasil logout.');
}
}
