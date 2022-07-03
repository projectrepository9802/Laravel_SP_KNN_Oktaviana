<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBasisPengetahuan extends Model
{
    protected $table = 'tabel_data_basis_pengetahuan';
    protected $fillable = [
        'id_penyakit',
        'id_gejala',
        'nilai_bobot'
    ];

    public function datapenyakit()
    {
        return $this->belongsTo(DataPenyakit::class, 'id_penyakit', 'id');
    }

    public function datagejala()
    {
        return $this->belongsTo(DataGejala::class, 'id_gejala', 'id');
    }
}
