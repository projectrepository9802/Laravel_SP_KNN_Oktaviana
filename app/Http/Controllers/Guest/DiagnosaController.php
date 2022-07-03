<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\DataRiwayatKasus;
use App\Models\DataRiwayatPasien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class DiagnosaController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Diagnosa',
            'navLink' => 'diagnosa',
            'dataGejala' => DataGejala::all()
        ];

        return view('Guest.Pages.diagnosa', $datas);
    }

    public function prosesData(Request $request)
    {
        $validReq = $request->validate(
            [
                'nama_pasien' => 'required',
                'jenis_kelamin' => 'required',
                'umur_pasien' => 'required',
                'GejalaUser' => 'required|min:2'
            ],
            [
                'nama_pasien.required' => 'Field Nama Lengkap Wajib Diisi',
                'jenis_kelamin.required' => 'Field Jenis Kelamin Wajib Diisi',
                'umur_pasien.required' => 'Field Umur Wajib Diisi',
                'GejalaUser.required' => 'Field Gejala User Wajib Diisi',
                'GejalaUser.min' => 'Gejala User min.2 Gejala'
            ]
        );

        $allDataGejala = DataGejala::all();

        /* # Nilai Bobot */
        foreach ($allDataGejala as $a => $b) {
            $nilaiBobot[$b->kode_gejala] = $b->nilai_bobot;
        }

        /* 1. Menkonversi Data Input User dengan String */
        $indexDataGejalaUser = [];
        foreach ($allDataGejala as $a => $b) {
            $indexDataGejalaUser[$b->kode_gejala] = "Tidak";
            foreach ($validReq['GejalaUser'] as $c => $d) {
                if ($b->kode_gejala == $d) {
                    $indexDataGejalaUser[$b->kode_gejala] = "Ya";
                }
            }
        }

        /* 2. Menkonversi Data Input Gejala dengan String */
        $allDataRiwayat = DataRiwayatKasus::all();
        foreach ($allDataGejala as $a => $b) {
            foreach ($allDataRiwayat as $c => $d) {
                $indexDataGejala[$d->hasil_diagnosa][$b->kode_gejala] = "Tidak";
                foreach (json_decode($d->array_gejala) as $e => $f) {
                    if ($b->kode_gejala == $f) {
                        $indexDataGejala[$d->hasil_diagnosa][$f] = "Ya";
                    }
                }
            }
        }

        foreach ($indexDataGejala as $a => $b) {
            foreach ($b as $c => $d) {
                $newDataGejalaIDX[$a][$c] = 0 * $nilaiBobot[$c];
                if ($indexDataGejalaUser[$c] === $d) {
                    $newDataGejalaIDX[$a][$c] = 1 * $nilaiBobot[$c];
                }
            }
        }

        foreach ($newDataGejalaIDX as $a => $b) {
            $totalNilai[$a] = 0;
            foreach ($b as $c => $d) {
                $totalNilai[$a] += $d;
            }

            $hasilAkhir[$a] = round($totalNilai[$a] / array_sum($nilaiBobot), 3);
        }

        $jsonDiagnosa['tanggal_jam_diagnosa'] = Carbon::now();
        $jsonDiagnosa['nama_lengkap'] = $validReq['nama_pasien'];
        $jsonDiagnosa['jenis_kelamin'] = $validReq['jenis_kelamin'];
        $jsonDiagnosa['umur'] = $validReq['umur_pasien'];

        foreach ($validReq['GejalaUser'] as $key => $value) {
            $jsonDiagnosa['tabel_gejala'][$value] = DataGejala::where('kode_gejala', $value)->first()->nama_gejala;
        }
        $jsonDiagnosa['tabel_gejala'] = json_encode($jsonDiagnosa['tabel_gejala']);

        $jsonDiagnosa['tabel_diagnosa'] = json_encode($hasilAkhir);

        $jsonDiagnosa['hasil_diagnosa']['nama_penyakit'] = array_search(max($hasilAkhir), $hasilAkhir);
        $jsonDiagnosa['hasil_diagnosa']['nilai_kedekatan'] = max($hasilAkhir);
        $jsonDiagnosa['hasil_diagnosa'] = json_encode($jsonDiagnosa['hasil_diagnosa']);

        $newDiagnosaPasien = new DataRiwayatPasien();
        $newDiagnosaPasien->tanggal_jam_diagnosa = $jsonDiagnosa['tanggal_jam_diagnosa'];
        $newDiagnosaPasien->nama_lengkap = $jsonDiagnosa['nama_lengkap'];
        $newDiagnosaPasien->jenis_kelamin = $jsonDiagnosa['jenis_kelamin'];
        $newDiagnosaPasien->umur = $jsonDiagnosa['umur'];
        $newDiagnosaPasien->tabel_gejala = $jsonDiagnosa['tabel_gejala'];
        $newDiagnosaPasien->tabel_diagnosa = $jsonDiagnosa['tabel_diagnosa'];
        $newDiagnosaPasien->hasil_diagnosa = $jsonDiagnosa['hasil_diagnosa'];
        $newDiagnosaPasien->save();

        $id_pasien = $newDiagnosaPasien->id;

        return redirect()->to('diagnosa/' . $id_pasien);
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

            return view('Guest.Pages.hasildiagnosa', $datas);
        } else {
            return redirect()->to('diagnosa')->with('notificationArea', 'Data Tidak Ditemukan');
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

            return PDF::loadView('Guest.Pages.printDiagnosa', $datas)->stream();
        } else {
            return redirect()->to('diagnosa')->with('notificationArea', 'Data Tidak Ditemukan');
        }
    }
}
