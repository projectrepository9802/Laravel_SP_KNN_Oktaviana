<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataGejala;
use Illuminate\Http\Request;

class DataGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'dataGejala' => DataGejala::all()
        ];

        return view('Admin.Pages.DataGejala.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Gejala'
        ];

        return view('Admin.Pages.DataGejala.create', $datas);
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
                'kode_gejala' => 'required|unique:tabel_data_gejala,kode_gejala',
                'nama_gejala' => 'required',
                'nilai_bobot' => 'required'
            ],
            [
                'kode_gejala.required' => 'Field Kode Gejala Wajib Diisi',
                'kode_gejala.unique' => 'Kode Gejala Harus Unik',
                'nama_gejala.required' => 'Field Nama Gejala Wajib Diisi',
                'nilai_bobot.required' => 'Field Nilai Bobot Wajib Diisi'
            ]
        );

        $newDataGejala = new DataGejala();
        $newDataGejala->kode_gejala = $validReq['kode_gejala'];
        $newDataGejala->nama_gejala = $validReq['nama_gejala'];
        $newDataGejala->nilai_bobot = $validReq['nilai_bobot'];
        $newDataGejala->save();

        return redirect()->to('data-gejala')->with('successMessage', 'Berhasil Menambahkan Data Gejala');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataGejala  $dataGejala
     * @return \Illuminate\Http\Response
     */
    public function show(DataGejala $dataGejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataGejala  $dataGejala
     * @return \Illuminate\Http\Response
     */
    public function edit(DataGejala $dataGejala)
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'dataGejala' => $dataGejala
        ];

        return view('Admin.Pages.DataGejala.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataGejala  $dataGejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataGejala $dataGejala)
    {
        $validReq = $request->validate(
            [
                'kode_gejala' => 'required|unique:tabel_data_gejala,kode_gejala,' . $dataGejala->id,
                'nama_gejala' => 'required',
                'nilai_bobot' => 'required'
            ],
            [
                'kode_gejala.required' => 'Field Kode Gejala Wajib Diisi',
                'kode_gejala.unique' => 'Kode Gejala Harus Unik',
                'nama_gejala.required' => 'Field Nama Gejala Wajib Diisi',
                'nilai_bobot.required' => 'Field Nilai Bobot Wajib Diisi'
            ]
        );

        $dataGejala->kode_gejala = $validReq['kode_gejala'];
        $dataGejala->nama_gejala = $validReq['nama_gejala'];
        $dataGejala->nilai_bobot = $validReq['nilai_bobot'];
        $dataGejala->save();

        return redirect()->to('data-gejala')->with('successMessage', 'Berhasil Mengubah Data Gejala');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataGejala  $dataGejala
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataGejala $dataGejala)
    {
        $dataGejala->delete();
        return redirect()->to('data-gejala')->with('successMessage', 'Berhasil Menghapus Data Gejala');
    }
}
