<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiPenyakitController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Informasi Penyakit',
            'navLink' => 'informasi'
        ];

        return view('Guest.Pages.informasi', $datas);
    }
}
