<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Penyakit',
            'dataPenyakit' => DataPenyakit::all()
        ];

        return view('Admin.Pages.DataPenyakit.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Penyakit'
        ];

        return view('Admin.Pages.DataPenyakit.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kode_penyakit' => 'required|unique:tabel_data_penyakit,kode_penyakit',
            'nama_penyakit' => 'required'
        ];
        $custMes = [
            'kode_penyakit.required' => 'Field Kode Penyakit Wajib Diisi',
            'kode_penyakit.unique' => 'Kode Penyakit Harus Unik',
            'nama_penyakit.required' => 'Field Nama Penyakit Wajib Diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $custMes);

        if (!$request->get('solusi_penyakit')) {
            return back()
                ->with('errorInput', 'Solusi Penyakit Wajib Diisi')
                ->withErrors($validator)
                ->withInput();
        }

        $rules['solusi_penyakit.*'] = 'required';

        $validator = Validator::make($request->all(), $rules);
        $validated = $validator->validated();

        $newDataPenyakit = new DataPenyakit();
        $newDataPenyakit->kode_penyakit = $validated['kode_penyakit'];
        $newDataPenyakit->nama_penyakit = $validated['nama_penyakit'];
        $newDataPenyakit->solusi_penyakit = json_encode($validated['solusi_penyakit']);
        $newDataPenyakit->save();

        return redirect()->to('data-penyakit')->with('successMessage', 'Berhasil Menambahkan Data Penyakit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function show(DataPenyakit $dataPenyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenyakit $dataPenyakit)
    {
        $datas = [
            'titlePage' => 'Data Penyakit',
            'dataPenyakit' => $dataPenyakit
        ];

        return view('Admin.Pages.DataPenyakit.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenyakit $dataPenyakit)
    {
        $rules = [
            'kode_penyakit' => 'required|unique:tabel_data_penyakit,kode_penyakit,' . $dataPenyakit->id,
            'nama_penyakit' => 'required'
        ];
        $custMes = [
            'kode_penyakit.required' => 'Field Kode Penyakit Wajib Diisi',
            'kode_penyakit.unique' => 'Kode Penyakit Harus Unik',
            'nama_penyakit.required' => 'Field Nama Penyakit Wajib Diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $custMes);

        if (!$request->get('solusi_penyakit')) {
            return back()
                ->with('errorInput', 'Solusi Penyakit Wajib Diisi')
                ->withErrors($validator)
                ->withInput();
        }

        $rules['solusi_penyakit.*'] = 'required';

        $validator = Validator::make($request->all(), $rules);
        $validated = $validator->validated();

        $dataPenyakit->kode_penyakit = $validated['kode_penyakit'];
        $dataPenyakit->nama_penyakit = $validated['nama_penyakit'];
        $dataPenyakit->solusi_penyakit = json_encode($validated['solusi_penyakit']);
        $dataPenyakit->save();

        return redirect()->to('data-penyakit')->with('successMessage', 'Berhasil Mengubah Data Penyakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenyakit $dataPenyakit)
    {
        $dataPenyakit->delete();
        return redirect()->to('data-penyakit')->with('successMessage', 'Berhasil Menghapus Data Penyakit');
    }
}
