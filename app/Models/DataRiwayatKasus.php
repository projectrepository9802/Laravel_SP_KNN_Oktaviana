<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataRiwayatKasus extends Model
{
    protected $table = 'tabel_data_riwayat_kasus';
    protected $fillable = [
        'kode_kasus',
        'array_gejala',
        'hasil_diagnosa'
    ];
}
