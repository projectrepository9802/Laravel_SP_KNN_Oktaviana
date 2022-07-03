@extends('Admin.Layouts.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                <i class="fas fa-viruses me-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success bg-gradient">
                <h6 class="card-title p-0 m-0 fw-bold text-white">
                    <i class="fas fa-edit me-1"></i>
                    Ubah {{ $titlePage }}
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('data-penyakit/' . $dataPenyakit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_penyakit" class="form-label">Kode Penyakit</label>
                        <input type="text" class="form-control @error('kode_penyakit') is-invalid @enderror"
                            id="kode_penyakit" name="kode_penyakit" placeholder="Masukkan Kode Penyakit..."
                            value="{{ old('kode_penyakit', $dataPenyakit->kode_penyakit) }}" autofocus>
                        @error('kode_penyakit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                        <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror"
                            id="nama_penyakit" name="nama_penyakit" placeholder="Masukkan Nama Penyakit..."
                            value="{{ old('nama_penyakit', $dataPenyakit->nama_penyakit) }}">
                        @error('nama_penyakit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="solusi_penyakit" class="col-sm-2 col-form-label">Solusi Penyakit</label>
                        <div class="col-sm-8" id="containerSolusi">
                            <button class="btn btn-success mb-2" type="button" onclick="addInput('nama_penyakit');">
                                <i class="fas fa-plus me-1"></i>
                                Tambah Solusi
                            </button>
                            @if (old('solusi_penyakit', $dataPenyakit->solusi_penyakit))
                                @php
                                    $x = 0;
                                @endphp
                                @foreach (old('solusi_penyakit', json_decode($dataPenyakit->solusi_penyakit)) as $item)
                                    <div class="row" id="widgetnama_penyakit{{ $x }}">
                                        <div class="col-sm-11">
                                            <input type="text"
                                                class="form-control mb-2 @error('solusi_penyakit.' . $x) is-invalid @enderror"
                                                name="solusi_penyakit[]" value="{{ $item }}" />
                                            @error('solusi_penyakit.' . $x)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-danger" type="button"
                                                onclick="document.getElementById('widgetnama_penyakit{{ $x }}').remove();">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @php
                                        $x++;
                                    @endphp
                                @endforeach
                            @else
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($errors->get('solusi_penyakit.*') as $error)
                                    <div class="row" id="widgetnama_penyakit{{ $i }}">
                                        <div class="col-sm-11">
                                            <input type="text"
                                                class="form-control mb-2 @error('solusi_penyakit.' . $i) is-invalid @enderror"
                                                name="solusi_penyakit[]" value="{{ old('solusi_penyakit.' . $i) }}" />
                                            @error('solusi_penyakit.' . $i)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-danger" type="button"
                                                onclick="document.getElementById('widgetnama_penyakit{{ $x }}').remove();">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                        @if (session()->has('errorInput'))
                            <p class="text-danger">{{ session('errorInput') }}</p>
                        @endif
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
            var fieldWrapper = $("<div class=\"row\" id=\"widgetnama_penyakit" + intId + "\"/>");
            fieldWrapper.data("idx", intId);

            var containerWrapper1 = $("<div class=\"col-sm-11\"/>");
            var fName = $("<input type=\"text\" class=\"form-control mb-2\" name=\"solusi_penyakit[]\" />");
            containerWrapper1.append(fName);

            var containerWrapper2 = $("<div class=\"col-sm-1\"/>");
            var removeButton = $("<button class=\"btn btn-danger\" type=\"button\" />");
            var iconDelete = $("<i class=\"fas fa-trash\"></i>");
            removeButton.append(iconDelete);
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
