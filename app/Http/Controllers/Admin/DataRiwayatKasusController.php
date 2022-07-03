<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\DataRiwayatKasus;
use Illuminate\Http\Request;

class DataRiwayatKasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Riwayat Kasus',
            'dataGejala' => DataGejala::all(),
            'dataRiwayatKasus' => DataRiwayatKasus::all()
        ];

        return view('Admin.Pages.DataRiwayatKasus.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Riwayat Kasus',
            'dataPenyakit' => DataPenyakit::all(),
            'dataGejala' => DataGejala::all()
        ];

        return view('Admin.Pages.DataRiwayatKasus.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validReq = $request->validate(
            [
                'kode_diagnosa' => 'required|unique:tabel_data_riwayat_kasus,kode_kasus',
                'daftarGejala' => 'required|array|min:2',
                'hasil_diagnosa' => 'required'
            ],
            [
                'kode_diagnosa.required' => 'Field Kode Diagnosa Wajib Diisi',
                'kode_diagnosa.unique' => 'Kode Diagnosa Harus Unik',
                'daftarGejala.required' => 'Field Daftar Gejala Wajib Diisi',
                'daftarGejala.min' => 'Kode Diagnosa Harus Memiliki Min. 2 Item',
                'hasil_diagnosa.required' => 'Field Hasil Diagnosa Wajib Diisi'
            ]
        );

        $newDataRiwayatKasus = new DataRiwayatKasus();
        $newDataRiwayatKasus->kode_kasus = $validReq['kode_diagnosa'];
        $newDataRiwayatKasus->array_gejala = json_encode($validReq['daftarGejala']);
        $newDataRiwayatKasus->hasil_diagnosa = $validReq['hasil_diagnosa'];
        $newDataRiwayatKasus->save();

        return redirect()->to('data-riwayat-kasus')->with('successMessage', 'Berhasil Menambahkan Data Riwayat Kasus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataRiwayatKasus  $dataRiwayatKasus
     * @return \Illuminate\Http\Response
     */
    public function show(DataRiwayatKasus $dataRiwayatKasus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataRiwayatKasus  $dataRiwayatKasus
     * @return \Illuminate\Http\Response
     */
    public function edit(DataRiwayatKasus $dataRiwayatKasus, $data_riwayat_kasus)
    {
        $dataRiwayatKasus = $dataRiwayatKasus->find($data_riwayat_kasus);

        $datas = [
            'titlePage' => 'Data Riwayat Kasus',
            'dataPenyakit' => DataPenyakit::all(),
            'dataGejala' => DataGejala::all(),
            'dataRiwayatKasus' => $dataRiwayatKasus
        ];

        return view('Admin.Pages.DataRiwayatKasus.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataRiwayatKasus  $dataRiwayatKasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataRiwayatKasus $dataRiwayatKasus, $data_riwayat_kasus)
    {
        $dataRiwayatKasus = $dataRiwayatKasus->find($data_riwayat_kasus);

        $validReq = $request->validate(
            [
                'kode_diagnosa' => 'required',
                'daftarGejala' => 'required|array|min:2',
                'hasil_diagnosa' => 'required'
            ],
            [
                'kode_diagnosa.required' => 'Field Kode Diagnosa Wajib Diisi',
                'daftarGejala.required' => 'Field Daftar Gejala Wajib Diisi',
                'daftarGejala.min' => 'Kode Diagnosa Harus Memiliki Min. 2 Item',
                'hasil_diagnosa.required' => 'Field Hasil Diagnosa Wajib Diisi'
            ]
        );

        $dataRiwayatKasus->kode_kasus = $validReq['kode_diagnosa'];
        $dataRiwayatKasus->array_gejala = json_encode($validReq['daftarGejala']);
        $dataRiwayatKasus->hasil_diagnosa = $validReq['hasil_diagnosa'];
        $dataRiwayatKasus->save();

        return redirect()->to('data-riwayat-kasus')->with('successMessage', 'Berhasil Mengubah Data Riwayat Kasus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataRiwayatKasus  $dataRiwayatKasus
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataRiwayatKasus $dataRiwayatKasus, $data_riwayat_kasus)
    {
        $dataRiwayatKasus = $dataRiwayatKasus->find($data_riwayat_kasus);
        $dataRiwayatKasus->delete();
        return redirect()->to('data-riwayat-kasus')->with('successMessage', 'Berhasil Menghapus Data Riwayat Kasus');
    }
}
