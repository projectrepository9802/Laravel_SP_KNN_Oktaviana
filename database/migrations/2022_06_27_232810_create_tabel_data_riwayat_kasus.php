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
        Schema::create('tabel_data_riwayat_kasus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kasus');
            $table->longText('array_gejala');
            $table->string('hasil_diagnosa');
            $table->timestamps();
        });

        $dataRiwayatKasus = [
            [
                'kode_kasus' => 'KL01',
                'array_gejala' => json_encode([
                    'G001',
                    'G002',
                    'G003',
                    'G005',
                    'G006',
                    'G008',
                    'G013'
                ]),
                'hasil_diagnosa' => 'Typhoid Fever',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kasus' => 'KL02',
                'array_gejala' => json_encode([
                    'G001',
                    'G003',
                    'G004',
                    'G008',
                    'G010',
                    'G011',
                    'G012',
                    'G014',
                    'G015'
                ]),
                'hasil_diagnosa' => 'Komplikasi Typhoid Fever (Pendarahan Dalam)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_kasus' => 'KL03',
                'array_gejala' => json_encode([
                    'G001',
                    'G002',
                    'G003',
                    'G007',
                    'G008',
                    'G009',
                    'G013',
                    'G014',
                    'G015'
                ]),
                'hasil_diagnosa' => 'Komplikasi Typhoid Fever (Perforasi)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('tabel_data_riwayat_kasus')->insert($dataRiwayatKasus);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_data_riwayat_kasus');
    }
};
