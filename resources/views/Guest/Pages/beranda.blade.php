@extends('Guest.Layouts.main')

@section('content-wrapper')
    <div class="card-body p-0 bg-success bg-gradient" style="height: 100%;">
        <div class="container" style="height: 100%;">
            <div class="row my-3">
                <div class="col-12 col-sm-6 my-5 my-lg-5">
                    <div class="my-5 my-lg-5">
                        <h4 class="text-white fw-bold" style="text-align: justify;">
                            Sistem Pakar K-Nearest Neighbor
                        </h4>
                        <p class="text-white" style="text-align: justify;">
                            K-Nearest Neighbor adalah salah satu algoritma machine learning dengan pendekatan supervised
                            learning
                            yang bekerja dengan mengkelaskan data baru menggunakan kemiripan antara data baru dengan
                            sejumlah data
                            (k) pada lokasi yang terdekat yang telah tersedia. Algoritma ini menerapkan lazy learning” atau
                            “instant
                            based learning” dan merupakan algoritma non parametrik. Algoritma KNN digunakan untuk
                            klasifikasi dan
                            regresi.
                        </p>
                        <a href="{{ URL::to('diagnosa') }}" class="btn"
                            style="background-color: white; color:#198754;">
                            <i class="fas fa-play-circle me-1"></i>
                            Mulai Diagnosa
                        </a>
                    </div>
                </div>
                <div class="d-none d-sm-block col-0 col-sm-6 my-lg-3">
                    <div class="my-lg-5 text-center">
                        <img src="{{ URL::to('bin/images/undraw_medical_research_qg4d.svg') }}" alt="konsultasi"
                            width="350" height="350">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
