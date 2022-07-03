<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataRiwayatPasien extends Model
{
    protected $table = 'tabel_data_riwayat_pasien';
    protected $fillable = [
        'tanggal_jam_diagnosa',
        'kode_pasien',
        'nama_pasien',
        'gejala_pasien',
        'hasil_diagnosa'
    ];
}
