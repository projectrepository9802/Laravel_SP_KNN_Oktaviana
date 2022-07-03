<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBasisPengetahuan;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\DataRiwayatKasus;
use App\Models\DataRiwayatPasien;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => "Dashboard",
            'dataPenyakit' => DataPenyakit::count(),
            'dataGejala' => DataGejala::count(),
            'dataBasisPengetahuan' => DataBasisPengetahuan::count(),
            'dataRiwayatKasus' => DataRiwayatKasus::count(),
            'dataRiwayatPasien' => DataRiwayatPasien::count()
        ];

        return view('Admin.Pages.dashboard', $datas);
    }
}
