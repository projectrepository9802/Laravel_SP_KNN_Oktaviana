@extends('Guest.Layouts.main')

@section('content-wrapper')
    <div class="card-body p-0 bg-success bg-gradient">
        <div class="container">
            <div class="container-fluid pb-5">
                <h3 class="text-center pb-5 pt-5 text-white fw-bold">Halaman Diagnosa</h3>
                @if (session()->has('notificationArea'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            {{ session('notificationArea') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header text-success fw-bold bg-white bg-gradient">
                        Konsultasi Gejala
                    </div>
                    <div class="card-body bg-success bg-gradient">
                        <form action="{{ URL::to('diagnosa') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="nama_pasien" class="col-sm-2 col-form-label text-white">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror"
                                        id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}"
                                        placeholder="Masukkan Nama Lengkap Anda...">
                                    @error('nama_pasien')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label text-white">Jenis Kelamin</label>
                                <div class="col-sm-3">
                                    @php
                                        $jenisKelamin = ['Laki - Laki', 'Perempuan'];
                                    @endphp
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin" id="jenis_kelamin">
                                        <option disabled selected>Pilih Jenis Kelamin...</option>
                                        @foreach ($jenisKelamin as $gender)
                                            @if (old('jenis_kelamin') == $gender)
                                                <option value="{{ $gender }}" selected>{{ $gender }}</option>
                                            @else
                                                <option value="{{ $gender }}">{{ $gender }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="umur_pasien" class="col-sm-2 col-form-label text-white">Umur</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control @error('umur_pasien') is-invalid @enderror"
                                        id="umur_pasien" name="umur_pasien" value="{{ old('umur_pasien') }}"
                                        placeholder="Masukkan Umur Anda...">
                                    @error('umur_pasien')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <p class="col-sm-2 p-0 m-0 py-2 text-white">Tahun</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            @error('GejalaUser')
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        {{ $message }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @else
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Warning:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        Pilih minimal 4 gejala yang anda rasakan selama 1 atau 2 minggu terakhir
                                    </div>
                                </div>
                            @enderror

                            <table class="table table-bordered" style="width: 100%;">
                                <colgroup>
                                    <col span="1" style="width: 3%;">
                                    <col span="1" style="width: 12%;">
                                    <col span="1" style="width: 80%;">
                                    <col span="1" style="width: 5%;">
                                </colgroup>
                                <thead class="text-white bg-white bg-gradient">
                                    <tr class="text-center text-success">
                                        <th>No.</th>
                                        <th>Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="text-white bg-secondary bg-gradient">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($dataGejala as $gejala)
                                        <tr>
                                            <td class="align-middle text-center">{{ $i }}</td>
                                            <td class="align-middle text-center">{{ $gejala->kode_gejala }}</td>
                                            <td>{{ $gejala->nama_gejala }}</td>
                                            <td class="align-middle text-center">
                                                <input class="form-check-input" type="checkbox" name="GejalaUser[]"
                                                    id="GejalaUser-{{ $i }}"
                                                    value="{{ $gejala->kode_gejala }}"
                                                    @if (is_array(old('GejalaUser')) && in_array($gejala->kode_gejala, old('GejalaUser'))) checked @endif>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary fw-bold" type="submit">
                                    <i class="fa-solid fa-floppy-disk me-1"></i>
                                    Proses Data
                                </button>
                                <button class="btn btn-secondary fw-bold" type="reset">
                                    <i class="fa-solid fa-ban me-1"></i>
                                    Cancel Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addOnJS')
    <script>
        $(document).ready(function() {
            $("#umur_pasien").inputFilter(function(value) {
                return /^\d*$/.test(value);
            }, "Umur harus berupa angka");
        });

        (function($) {
            $.fn.inputFilter = function(callback, errMsg) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(
                    e) {
                    if (callback(this.value)) {
                        // Accepted value
                        if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                            $(this).removeClass("input-error");
                            this.setCustomValidity("");
                        }
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        // Rejected value - restore the previous one
                        $(this).addClass("input-error");
                        this.setCustomValidity(errMsg);
                        this.reportValidity();
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        // Rejected value - nothing to restore
                        this.value = "";
                    }
                });
            };
        }(jQuery));
    </script>
@endsection
