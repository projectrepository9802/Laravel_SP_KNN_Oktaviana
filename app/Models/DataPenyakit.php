<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    protected $table = 'tabel_data_penyakit';
    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'solusi_penyakit'
    ];
}
