@extends('Admin.Layouts.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                <i class="fas fa-fw fa-tachometer-alt mr-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100 py-2 bg-primary bg-gradient shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Data Penyakit
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $dataPenyakit }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-viruses fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100 py-2 bg-success bg-gradient shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Data Gejala
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $dataGejala }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-medical fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100 py-2 bg-info bg-gradient shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Data Basis Pengetahuan
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-white">
                                            {{ $dataBasisPengetahuan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-md fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100 py-2 bg-warning bg-gradient shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Data Riwayat Kasus</div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $dataRiwayatKasus }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-medical fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100 py-2 bg-danger bg-gradient shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Data Riwayat Pasien</div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $dataRiwayatPasien }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-history fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
