@extends('Admin.Layouts.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                <i class="fas fa-file-medical me-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success bg-gradient">
                <h6 class="card-title p-0 m-0 fw-bold text-white">
                    <i class="fas fa-plus me-1"></i>
                    Tambah {{ $titlePage }}
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('data-riwayat-kasus') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_diagnosa" class="form-label">Kode Diagnosa</label>
                        <input type="text" class="form-control @error('kode_diagnosa') is-invalid @enderror"
                            id="kode_diagnosa" name="kode_diagnosa" placeholder="Masukkan Kode Diagnosa..."
                            value="{{ old('kode_diagnosa') }}" autofocus>
                        @error('kode_diagnosa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="daftar_gejala" class="form-label">Daftar Gejala</label>
                        <div id="containerSolusi">
                            <button class="btn btn-success mb-3" type="button" id="btnTambahDaftarGejala"
                                onclick="addInput('daftarGejala');">
                                <i class="fas fa-plus me-1"></i>
                                Tambah Gejala
                            </button>
                            @if ($errors->has('daftarGejala'))
                                <p class="text-danger">{{ $errors->get('daftarGejala')[0] }}</p>
                                @if (old('daftarGejala'))
                                    @for ($i = 0; $i < count(old('daftarGejala')); $i++)
                                        <div class="row" id="daftarGejalaContainer-{{ $i }}">
                                            <div class="col-sm-11">
                                                <select class="form-select mb-2" name="daftarGejala[]"
                                                    id="daftarGejala-{{ $i }}">
                                                    @foreach ($dataGejala as $gejala)
                                                        @if (old('daftarGejala.' . $i) == $gejala->kode_gejala)
                                                            <option value="{{ $gejala->kode_gejala }}" selected>
                                                                {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $gejala->kode_gejala }}">
                                                                {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                                <button class="btn btn-danger" type="button"
                                                    onclick="document.getElementById('daftarGejalaContainer-{{ $i }}').remove()">-</button>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            @else
                                @if (old('daftarGejala'))
                                    @for ($i = 0; $i < count(old('daftarGejala')); $i++)
                                        <div class="row" id="daftarGejalaContainer-{{ $i }}">
                                            <div class="col-sm-11">
                                                <select class="form-select mb-2" name="daftarGejala[]"
                                                    id="daftarGejala-{{ $i }}">
                                                    @foreach ($dataGejala as $gejala)
                                                        @if (old('daftarGejala.' . $i) == $gejala->kode_gejala)
                                                            <option value="{{ $gejala->kode_gejala }}" selected>
                                                                {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $gejala->kode_gejala }}">
                                                                {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                                <button class="btn btn-danger" type="button"
                                                    onclick="document.getElementById('daftarGejalaContainer-{{ $i }}').remove()">-</button>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="hasil_diagnosa" class="form-label">Hasil Diagnosa</label>
                        <select class="form-select @error('hasil_diagnosa') is-invalid @enderror" name="hasil_diagnosa"
                            id="hasil_diagnosa">
                            <option disabled selected>Pilih Hasil Diagnosa...</option>
                            @foreach ($dataPenyakit as $penyakit)
                                @if (old('hasil_diagnosa') == $penyakit->nama_penyakit)
                                    <option value="{{ $penyakit->nama_penyakit }}" selected>
                                        {{ $penyakit->nama_penyakit }}
                                    </option>
                                @else
                                    <option value="{{ $penyakit->nama_penyakit }}">
                                        {{ $penyakit->nama_penyakit }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('hasil_diagnosa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success me-md-2">
                            <i class="fas fa-save me-1"></i>
                            Simpan Data
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-ban me-1"></i>
                            Cancel Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function addInput(namaInput) {
            var container = "#containerSolusi div:last";
            var lastField = $(container);
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $("<div class=\"row\" id=\"daftarGejala-" + intId + "\"/>");
            fieldWrapper.data("idx", intId);

            var containerWrapper1 = $("<div class=\"col-sm-11\"/>");
            const dataGejala = {!! json_encode($dataGejala) !!};
            var selectWidget = "<select class=\"form-select mb-2\" name=\"daftarGejala[]\">";
            selectWidget += "<option disabled selected>Pilih Gejala Diagnosa...</option>";
            dataGejala.forEach(element => {
                selectWidget +=
                    `<option value="${element.kode_gejala}">${element.kode_gejala + " - " + element.nama_gejala}</option>`;
            });
            selectWidget += "</select>";
            var fName = $(selectWidget);
            containerWrapper1.append(fName);

            var containerWrapper2 = $("<div class=\"col-sm-1\"/>");
            var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" value=\"-\" />");
            containerWrapper2.append(removeButton);

            removeButton.click(function() {
                fieldWrapper.remove();
            });

            fieldWrapper.append(containerWrapper1);
            fieldWrapper.append(containerWrapper2);
            $("#containerSolusi").append(fieldWrapper);
        }
    </script>
@endsection
