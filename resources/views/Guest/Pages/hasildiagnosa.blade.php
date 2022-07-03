@extends('Guest.Layouts.main')

@section('content-wrapper')
    <div class="card-body p-0 bg-success bg-gradient">
        <div class="container">
            <div class="container-fluid pb-5">
                <h3 class="text-center pb-5 pt-5 text-white fw-bold">Hasil Diagnosa</h3>
                <div class="card shadow">
                    <div class="card-header text-success fw-bold bg-white bg-gradient d-flex justify-content-between"
                        style="width: 100%;">
                        <p class="p-0 m-0 py-2">Laman Hasil Diagnosa</p>
                        <a class="btn btn-success"
                            href="{{ URL::to(Request::segment(1) . '/' . Request::segment(2) . '/print') }}">
                            <i class="fas fa-print me-1"></i>
                            Print Hasil
                        </a>
                    </div>
                    <div class="card-body bg-success bg-gradient text-white">
                        <div class="row">
                            <div class="col-sm-6">
                                <table style="width: 100%;">
                                    <colgroup>
                                        <col style="width: 38%;">
                                        <col style="width: 3%;">
                                        <col style="width: 59%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Tanggal & Jam Diagnosa</td>
                                            <td class="fw-bold">:</td>
                                            <td>{{ $dataPasien->tanggal_jam_diagnosa }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table style="width: 100%;">
                                    <colgroup>
                                        <col style="width: 38%;">
                                        <col style="width: 3%;">
                                        <col style="width: 59%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Nama Lengkap</td>
                                            <td class="fw-bold">:</td>
                                            <td>{{ $dataPasien->nama_lengkap }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <table style="width: 100%;">
                                    <colgroup>
                                        <col style="width: 38%;">
                                        <col style="width: 3%;">
                                        <col style="width: 59%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Jenis Kelamin</td>
                                            <td class="fw-bold">:</td>
                                            <td>{{ $dataPasien->jenis_kelamin }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table style="width: 100%;">
                                    <colgroup>
                                        <col style="width: 38%;">
                                        <col style="width: 3%;">
                                        <col style="width: 59%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Umur</td>
                                            <td class="fw-bold">:</td>
                                            <td>{{ $dataPasien->umur }} Tahun</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-2" style="border-top: 2px solid #fff;">
                        </div>
                        <p class="fw-bold mb-3">*) Tabel Data Gejala</p>
                        <table class="table table-bordered" style="width: 100%;">
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 20%;">
                                <col style="width: 75%;">
                            </colgroup>
                            <thead class="text-success bg-white bg-gradient">
                                <tr>
                                    <th class="align-middle text-center">No.</th>
                                    <th class="align-middle text-center">Kode Gejala</th>
                                    <th class="align-middle text-center">Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody class="text-white bg-secondary bg-gradient">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach (json_decode($dataPasien->tabel_gejala) as $key => $val)
                                    <tr>
                                        <td class="align-middle text-center">{{ $i }}</td>
                                        <td class="align-middle text-center">{{ $key }}</td>
                                        <td class="align-middle">{{ $val }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mb-2" style="border-top: 2px solid #fff;">
                        </div>
                        <p class="fw-bold mb-3">*) Tabel Data Hasil Diagnosa</p>
                        <table class="table table-bordered" style="width: 100%;">
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 75%;">
                                <col style="width: 20%;">
                            </colgroup>
                            <thead class="text-success bg-white bg-gradient">
                                <tr>
                                    <th class="align-middle text-center">No.</th>
                                    <th class="align-middle text-center">Nama Penyakit</th>
                                    <th class="align-middle text-center">Nilai Bobot</th>
                                </tr>
                            </thead>
                            <tbody class="text-white bg-secondary bg-gradient">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach (json_decode($dataPasien->tabel_diagnosa) as $key => $val)
                                    <tr>
                                        <td class="align-middle text-center">{{ $i }}</td>
                                        <td class="align-middle text-center">{{ $key }}</td>
                                        <td class="align-middle text-center">{{ $val }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mb-2" style="border-top: 2px solid #fff;">
                        </div>
                        <p style="text-align: justify;">
                            Dari data diatas, dapat disimpulkan bahwa pasien tersebut menderita <b>Penyakit
                                {{ json_decode($dataPasien->hasil_diagnosa)->nama_penyakit }}</b>, dengan nilai bobot
                            penyakit ialah <b>{{ json_decode($dataPasien->hasil_diagnosa)->nilai_kedekatan }}</b>. Untuk
                            solusi dari penyakit tersebut, dapat dilihat dibawah ini.
                        </p>
                        <table class="table table-bordered" style="width: 100%;">
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 95%;">
                            </colgroup>
                            <thead class="text-success bg-white bg-gradient">
                                <tr>
                                    <th class="align-middle text-center">No.</th>
                                    <th class="align-middle text-center">Solusi Penyakit</th>
                                </tr>
                            </thead>
                            <tbody class="text-white bg-secondary bg-gradient">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach (json_decode($dataSolusi->solusi_penyakit) as $solusiPenyakit)
                                    <tr>
                                        <td class="align-middle text-center">{{ $i }}</td>
                                        <td class="align-middle">{{ $solusiPenyakit }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
