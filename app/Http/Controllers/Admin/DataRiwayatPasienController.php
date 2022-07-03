<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPenyakit;
use App\Models\DataRiwayatPasien;
use Illuminate\Http\Request;
use PDF;

class DataRiwayatPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Riwayat Pasien',
            'dataRiwayatPasien' => DataRiwayatPasien::all()
        ];

        return view('Admin.Pages.DataRiwayatPasien.index', $datas);
    }

    public function showData($id_pasien)
    {
        $dataPasien = DataRiwayatPasien::find($id_pasien);

        if ($dataPasien) {
            $datas = [
                'titlePage' => 'Hasil Diagnosa',
                'navLink' => 'diagnosa',
                'dataPasien' => $dataPasien,
                'dataSolusi' => DataPenyakit::where('nama_penyakit', json_decode($dataPasien->hasil_diagnosa)->nama_penyakit)->first()
            ];

            return view('Admin.Pages.DataRiwayatPasien.hasil', $datas);
        } else {
            return redirect()->to('data-riwayat-pasien');
        }
    }

    public function printData($id_pasien)
    {
        $dataPasien = DataRiwayatPasien::find($id_pasien);

        if ($dataPasien) {
            $datas = [
                'titlePage' => 'Hasil Diagnosa',
                'navLink' => 'diagnosa',
                'dataPasien' => $dataPasien,
                'dataSolusi' => DataPenyakit::where('nama_penyakit', json_decode($dataPasien->hasil_diagnosa)->nama_penyakit)->first()
            ];

            return PDF::loadView('Admin.Pages.DataRiwayatPasien.print', $datas)->stream();
        } else {
            return redirect()->to('data-riwayat-pasien');
        }
    }

    public function hapusData($id_pasien)
    {
        $dataRiwayatPasien = DataRiwayatPasien::find($id_pasien);
        $dataRiwayatPasien->delete();
        return redirect()->to('data-riwayat-pasien')->with('successMessage', 'Berhasil Menghapus Data Riwayat Pasien');
    }
}
