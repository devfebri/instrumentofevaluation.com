<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
        if ($request->remember === null) {
            setcookie('username', $request->username, 100);
            setcookie('password', $request->password, 100);
        } else {
            // dd('ok');
            setcookie('username', $request->username, time() + 60 * 60 * 24 * 100);
            setcookie('password', $request->password, time() + 60 * 60 * 24 * 100);
        }
        // dd(auth()->user()->role);


        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect(route(auth()->user()->role . '_dashboard'))->with('pesan', 'Selamat datang kembali "' . auth()->user()->name . '"');
        } else {
            return redirect('/')->with('gagal', 'Periksa Username dan Password anda');
        }

        return redirect()->back();
    }

    public function register()
    {
        $kelas=Kelas::orderBy('id','desc')->get();
        return view('auth.register',compact('kelas'));
    }

    public function proses_register(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'unique:users',
            'no_hp' => 'unique:users'
        ]);
        // dd($request->all());
        User::create([
            "username"      => $request->nim,
            "kelas_id"      => $request->kelas_id,
            "password"      => bcrypt($request->nim),
            "nim"           => $request->nim,
            "name"          => $request->nama,
            "no_hp"         => $request->no_hp,
            "tmpt_lahir"    => $request->tmpt_lahir,
            "tgl_lahir"     => $request->tgl_lahir,
            "alamat"        => $request->alamat,
            "jk"            => $request->jk,
            "role"          => 'mahasiswa'
        ]);
        if (Auth::attempt(['username' => $request->nim, 'password' => $request->nim])) {

            return redirect(route(auth()->user()->role . '_dashboard'))->with('pesan', 'Selamat datang "' . auth()->user()->name . '"');
        } else {
            return redirect('/')->with('gagal', 'Periksa Username dan Password anda');
        }
        return redirect()->back();
        // dd($request->all());
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
