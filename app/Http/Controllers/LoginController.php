<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function tampil_login() {
        return view('login.index');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login berhasil dilakukan');
        }

        return back('/login')->with('error', 'Username atau Password salah!');
    }

    public function tampil_register() {
        return view('register.index');
    }

    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' =>'required|min:5|max:255'
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registerasi berhasil, silahkan login');
    }

    public function tampil_register_admin() {
        return view('register.registerAdmin');
    }

    public function registerAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' =>'required|min:5|max:255'
        ]);
        
        $validatedData['level'] = "admin";

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registerasi berhasil, silahkan login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
