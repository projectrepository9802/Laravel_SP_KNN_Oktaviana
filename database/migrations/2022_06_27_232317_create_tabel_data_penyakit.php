<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_data_penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit');
            $table->string('nama_penyakit');
            $table->longText('solusi_penyakit');
            $table->timestamps();
        });

        $dataPenyakit = [
            [
                'kode_penyakit' => 'P001',
                'nama_penyakit' => 'Typhoid Fever',
                'solusi_penyakit' => json_encode([
                    'Minum Obat Paracetamol dan antibiotik seperti ciprofloxacin, azithromycin, atau ceftriaxone.',
                    'Minum air yang cukup',
                    'Istirahat yang cukup',
                    'Menjaga kebersihan.'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => 'P002',
                'nama_penyakit' => 'Komplikasi Typhoid Fever (Pendarahan Dalam)',
                'solusi_penyakit' => json_encode([
                    'Segera dibawa kerumah sakit yang memiliki dokter spesialis penyakit dalam untuk melakukan pemeriksaan lebih lanjut.'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_penyakit' => 'P003',
                'nama_penyakit' => 'Komplikasi Typhoid Fever (Perforasi)',
                'solusi_penyakit' => json_encode([
                    'Segera dibawa kerumah sakit yang memiliki dokter spesialis penyakit dalam untuk melakukan pemeriksaan lebih lanjut.'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('tabel_data_penyakit')->insert($dataPenyakit);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_data_penyakit');
    }
};
