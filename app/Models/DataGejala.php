<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataGejala extends Model
{
    protected $table = 'tabel_data_gejala';
    protected $fillable = [
        'kode_gejala',
        'nama_gejala'
    ];
}
