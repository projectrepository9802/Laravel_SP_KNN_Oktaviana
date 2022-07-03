<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        $datas = [
            'titlePage' => 'Login',
            'navLink' => 'login'
        ];

        return view('Guest.Auth.login', $datas);
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ],
            [
                'username.required' => 'Field Username Wajib Diisi',
                'password.required' => 'Field Password Wajib Diisi'
            ]
        );

        $remember = false;
        if ($request->get('remember') == "on") {
            $remember = true;
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('errorMessage', 'Username atau Password Salah!');
    }

    public function lupapasswordPage()
    {
        $datas = [
            'titlePage' => 'Lupa Password',
            'navLink' => 'lupa-password'
        ];

        return view('Guest.Auth.lupapassword', $datas);
    }

    public function lupapasswordProcess(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => ['required'],
                'old_password' => ['required'],
                'password' => 'required|confirmed|min:8'
            ],
            [
                'username.required' => 'Field Username Wajib Diisi',
                'old_password.required' => 'Field Password Lama Wajib Diisi',
                'password.required' => 'Field Password Wajib Diisi',
                'password.confirmed' => 'Password Harus Sama',
                'password.min' => 'Password min.8 karakter'
            ]
        );

        $searchIDUser = User::where('username', $credentials['username'])->first();
        $searchIDUser->password = Hash::make($credentials['password']);
        $searchIDUser->save();

        return redirect()->to('login')->with('successMessage', 'Berhasil Memverifikasi Password. Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
