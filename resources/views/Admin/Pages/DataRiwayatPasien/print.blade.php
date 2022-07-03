<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .print-wrapper>h2 {
            text-align: center;
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .mb-1 {
            margin-bottom: 1em;
        }

        .mb-2 {
            margin-bottom: 2em;
        }

        .mb-3 {
            margin-bottom: 3em;
        }

        .mb-4 {
            margin-bottom: 4em;
        }

        .mb-5 {
            margin-bottom: 5em;
        }

        .fw-bold {
            font-weight: bold;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        .table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <title>SP K-Nearest Neighbor | Hasil Diagnosa</title>
</head>

<body>
    <div class="print-wrapper">
        <h2 class="mb-2">Hasil Diagnosa</h2>
        <div class="row">
            <div class="column">
                <table>
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
            <div class="column">
                <table>
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
        <div class="row mb-1">
            <div class="column">
                <table>
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
            <div class="column">
                <table>
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
        <div class="mb-1" style="border-top: 2px solid #000;">
        </div>
        <p class="fw-bold mb-1">*) Tabel Data Gejala</p>
        <table class="table mb-1" style="width: 100%;">
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
        <div class="mb-1" style="border-top: 2px solid #000;">
        </div>
        <p class="fw-bold mb-1">*) Tabel Data Hasil Diagnosa</p>
        <table class="table mb-1" style="width: 100%;">
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
        <div class="mb-1" style="border-top: 2px solid #000;">
        </div>
        <p style="text-align: justify;">
            Dari data diatas, dapat disimpulkan bahwa pasien tersebut menderita <b>Penyakit
                {{ json_decode($dataPasien->hasil_diagnosa)->nama_penyakit }}</b>, dengan nilai bobot
            penyakit ialah <b>{{ json_decode($dataPasien->hasil_diagnosa)->nilai_kedekatan }}</b>. Untuk
            solusi dari penyakit tersebut, dapat dilihat dibawah ini.
        </p>
        <table class="table" style="width: 100%;">
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
                        <td class="align-middle" style="text-align: justify;">{{ $solusiPenyakit }}</td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
</body>

</html>
