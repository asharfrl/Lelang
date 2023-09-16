<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index()
    {

        return view('welcome');
    }

    public function authanticate(Request $request)
    {

        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            if (Auth::user()->level == 'Admin') {
                return redirect('/dashboard')->with('success', 'Login Berhasil.');
            }elseif (Auth::user()->level == 'Petugas') {
                return redirect('/dashboard')->with('success', 'Login Berhasil.');
            }elseif (Auth::user()->level == 'Masyarakat') {
                return redirect('/masyarakat')->with('success', 'Login Berhasil.');
            }
            $request->session()->regenerate();

            // return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        }

        return back()->with('loginError', 'Login gagal! Silahkan coba lagi');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_petugas' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:2|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect()->route('welcome')->with('success', 'Anda Telah Membuat Akun');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
