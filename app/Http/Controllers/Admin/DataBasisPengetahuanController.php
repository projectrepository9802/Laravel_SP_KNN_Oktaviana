<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBasisPengetahuan;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class DataBasisPengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Basis Pengetahuan',
            'dataBasisPengetahuan' => DataBasisPengetahuan::all()
        ];

        return view('Admin.Pages.DataBasisPengetahuan.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Basis Pengetahuan',
            'dataPenyakit' => DataPenyakit::all(),
            'dataGejala' => DataGejala::all()
        ];

        return view('Admin.Pages.DataBasisPengetahuan.create', $datas);
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
                'id_penyakit' => 'required',
                'id_gejala' => 'required'
            ],
            [
                'id_penyakit.required' => 'Field Detail Penyakit Wajib Diisi',
                'id_gejala.required' => 'Field Detail Gejala Wajib Diisi'
            ]
        );

        $newDataBasisPengetahuan = new DataBasisPengetahuan();
        $newDataBasisPengetahuan->id_penyakit = $validReq['id_penyakit'];
        $newDataBasisPengetahuan->id_gejala = $validReq['id_gejala'];
        $newDataBasisPengetahuan->save();

        return redirect()->to('data-basis-pengetahuan')->with('successMessage', 'Berhasil Menambahkan Data Basis Pengetahuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataBasisPengetahuan  $dataBasisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(DataBasisPengetahuan $dataBasisPengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBasisPengetahuan  $dataBasisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBasisPengetahuan $dataBasisPengetahuan)
    {
        $datas = [
            'titlePage' => 'Data Basis Pengetahuan',
            'dataPenyakit' => DataPenyakit::all(),
            'dataGejala' => DataGejala::all(),
            'dataBasisPengetahuan' => $dataBasisPengetahuan
        ];

        return view('Admin.Pages.DataBasisPengetahuan.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBasisPengetahuan  $dataBasisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBasisPengetahuan $dataBasisPengetahuan)
    {
        $validReq = $request->validate(
            [
                'id_penyakit' => 'required',
                'id_gejala' => 'required'
            ],
            [
                'id_penyakit.required' => 'Field Detail Penyakit Wajib Diisi',
                'id_gejala.required' => 'Field Detail Gejala Wajib Diisi'
            ]
        );

        $dataBasisPengetahuan->id_penyakit = $validReq['id_penyakit'];
        $dataBasisPengetahuan->id_gejala = $validReq['id_gejala'];
        $dataBasisPengetahuan->save();

        return redirect()->to('data-basis-pengetahuan')->with('successMessage', 'Berhasil Mengubah Data Basis Pengetahuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBasisPengetahuan  $dataBasisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataBasisPengetahuan $dataBasisPengetahuan)
    {
        $dataBasisPengetahuan->delete();
        return redirect()->to('data-basis-pengetahuan')->with('successMessage', 'Berhasil Menghapus Data Basis Pengetahuan');
    }
}
