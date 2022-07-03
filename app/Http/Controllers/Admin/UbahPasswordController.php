<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Ubah Password'
        ];

        return view('Admin.Pages.ubahpassword', $datas);
    }

    public function prosesUbahPassword(Request $request)
    {
        $idUser = Auth::id();
        $dataUser = User::find($idUser);

        $validReq = $request->validate(
            [
                'password' => 'required|confirmed|min:8'
            ],
            [
                'password.required' => 'Field Password Wajib Diisi',
                'password.confirmed' => 'Password Harus Sama',
                'password.min' => 'Password min.8 karakter'
            ]
        );

        $dataUser->password = Hash::make($validReq['password']);
        $dataUser->save();

        return redirect()->to('ubah-password')->with('successMessage', 'Berhasil Mengubah Password');
    }
}
