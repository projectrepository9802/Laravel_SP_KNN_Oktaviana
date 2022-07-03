<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Beranda',
            'navLink' => 'beranda'
        ];

        return view('Guest.Pages.beranda', $datas);
    }
}
