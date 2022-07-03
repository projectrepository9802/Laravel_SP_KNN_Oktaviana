@extends('Admin.Layouts.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                <i class="fas fa-user-md me-1"></i>
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
                <form action="{{ URL::to('data-basis-pengetahuan/' . $dataBasisPengetahuan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id_penyakit" class="form-label">Detail Penyakit</label>
                        <select class="form-select @error('id_penyakit') is-invalid @enderror" name="id_penyakit"
                            id="id_penyakit">
                            <option selected disabled>Pilih Detail Penyakit...</option>
                            @foreach ($dataPenyakit as $penyakit)
                                @if (old('id_penyakit', $dataBasisPengetahuan->id_penyakit) == $penyakit->id)
                                    <option value="{{ $penyakit->id }}" selected>
                                        {{ $penyakit->kode_penyakit . ' - ' . $penyakit->nama_penyakit }}
                                    </option>
                                @else
                                    <option value="{{ $penyakit->id }}">
                                        {{ $penyakit->kode_penyakit . ' - ' . $penyakit->nama_penyakit }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_penyakit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_gejala" class="form-label">Detail Gejala</label>
                        <select class="form-select @error('id_gejala') is-invalid @enderror" name="id_gejala"
                            id="id_gejala">
                            <option selected disabled>Pilih Detail Gejala...</option>
                            @foreach ($dataGejala as $gejala)
                                @if (old('id_gejala', $dataBasisPengetahuan->id_gejala) == $gejala->id)
                                    <option value="{{ $gejala->id }}" selected>
                                        {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                    </option>
                                @else
                                    <option value="{{ $gejala->id }}">
                                        {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_gejala')
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
