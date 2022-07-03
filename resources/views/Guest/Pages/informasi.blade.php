@extends('Guest.Layouts.main')

@section('content-wrapper')
    <style>
        .accordion {
            --bs-accordion-color: #fff;
            --bs-accordion-bg: #198754;
            --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
            --bs-accordion-border-color: #198754;
            --bs-accordion-border-width: 1px;
            --bs-accordion-border-radius: 0.375rem;
            --bs-accordion-inner-border-radius: calc(0.375rem - 1px);
            --bs-accordion-btn-padding-x: 1.25rem;
            --bs-accordion-btn-padding-y: 1rem;
            --bs-accordion-btn-color: #198754;
            --bs-accordion-btn-bg: #fff;
            --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23198754'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            --bs-accordion-btn-icon-width: 1.25rem;
            --bs-accordion-btn-icon-transform: rotate(-180deg);
            --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
            --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            --bs-accordion-btn-focus-border-color: #198754;
            --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
            --bs-accordion-body-padding-x: 1.25rem;
            --bs-accordion-body-padding-y: 1rem;
            --bs-accordion-active-color: #fff;
            --bs-accordion-active-bg: #198754;
        }
    </style>
    <div class="card-body p-0 bg-success bg-gradient">
        <div class="container mb-3" style="height: 100%;">
            <div class="container-fluid" style="height: 100%;">
                <h3 class="text-center pb-5 pt-5 text-white fw-bold">Informasi Penyakit</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Penyakit Typhoid Fever
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ URL::to('bin/images/typoid.jpg') }}" alt="" width="100%">
                                    </div>
                                    <div class="col-sm-9">
                                        <p style="text-align: justify;">
                                            <strong>Typhoid fever</strong> adalah infeksi akut pada saluran pencernaan yang
                                            disebabkan oleh
                                            bakteri salmonella typhi. Demam tifoid merupakan penyakit yang mudah menular dan
                                            dapat menyerang banyak orang, Penularan demam tifoid (typhoid fever) dapat
                                            terjadi melalui berbagai cara, melalui makanan atau minuman yang terkontaminasi
                                            dan melalui perantara lalat Penularan demam tifoid selain dari menelan makanan
                                            atau minuman yang terkontaminasi dapat juga melalui kontak langsung jari tangan
                                            yang terkontaminasi tinja, urin atau dengan penderita yang terinfeksi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Penyakit Komplikasi Typhoid Fever (Perdarahan Dalam)
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ URL::to('bin/images/typhoid1.jpg') }}" alt="" width="100%">
                                    </div>
                                    <div class="col-sm-9">
                                        <p style="text-align: justify;">
                                            <strong>Pendarahan dalam</strong> adalah pendarahan yang terjadi didalam
                                            jaringan, organ, atau
                                            rongga tubuh. Kecurigaan biasanya baru muncul bila tubuh mengalami kehilangan
                                            darah dalam jumlah besar atau terdapat gumpalan darah yang menekan organ dalam
                                            tubuh sehingga tidak berfungsi dengan baik. Perdarahan dapat terjadi pada organ
                                            pencernaan. Perdarahan dalam merupakan suatu komplikasi akibat infeksi
                                            demam tifoid (typhoid fever). Pemeriksaan penunjang yang dilakukan meliputi
                                            Pemeriksaan darah untuk mengetahui jumlah sel darah merah dalam tubuh.
                                            Pemeriksaan CT scan, rontgen, kolonoskopi, atau endoskopi untuk melihat gambaran
                                            luka yang tejadi dalam tubuh.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Penyakit Komplikasi Typhoid Fever (Perforasi Usus)
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ URL::to('bin/images/typhoid2.jpg') }}" alt="" width="100%">
                                    </div>
                                    <div class="col-sm-9">
                                        <p style="text-align: justify;">
                                            Terjadi pada sekitar 3% dari penderita typhoid fever. Biasanya timbul pada
                                            minggu ketiga namun dapat pula terjadi pada minggu pertama. perforasi usus
                                            adalah suatu celah, lubang, atau ketidaksinambungan pada dinding usus. Kondisi
                                            ini juga dapat didefinisikan sebagai lubang pada dinding usus sehingga isi usus
                                            dapat keluar ke dalam rongga abdomen. Perforasi usus merupakan suatu komplikasi
                                            akibat infeksi demam tifoid (typhoid fever). Pemeriksaan penunjang yang
                                            dilakukan meliputi pemeriksaan hematologi, serta pencitraan seperti rontgen,
                                            ultrasonografi, dan CT scan abdomen. Tindakan utama untuk perforasi usus adalah
                                            operasi atau pemberian terapi penunjang.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
