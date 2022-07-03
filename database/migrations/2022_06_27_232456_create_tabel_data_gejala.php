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
        Schema::create('tabel_data_gejala', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala');
            $table->string('nama_gejala');
            $table->double('nilai_bobot');
            $table->timestamps();
        });

        $dataGejala = [
            [
                'kode_gejala' => 'G001',
                'nama_gejala' => 'Demam yang meningkat setiap hari',
                'nilai_bobot' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G002',
                'nama_gejala' => 'Sakit kepala',
                'nilai_bobot' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G003',
                'nama_gejala' => 'Tubuh terasa lemas dan lelah',
                'nilai_bobot' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G004',
                'nama_gejala' => 'Nyeri otot',
                'nilai_bobot' => 0.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G005',
                'nama_gejala' => 'Kehilangan nafsu makan dan penurunan berat badan',
                'nilai_bobot' => 0.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G006',
                'nama_gejala' => 'Sakit perut',
                'nilai_bobot' => 0.4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G007',
                'nama_gejala' => 'Sakit perut hebat yang muncul tiba - tiba',
                'nilai_bobot' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G008',
                'nama_gejala' => 'Diare atau sembelit',
                'nilai_bobot' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G009',
                'nama_gejala' => 'Perut yang membengkak',
                'nilai_bobot' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G010',
                'nama_gejala' => 'Kulit pucat',
                'nilai_bobot' => 0.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G011',
                'nama_gejala' => 'Muntah darah',
                'nilai_bobot' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G012',
                'nama_gejala' => 'Feses berwarna sangat gelap',
                'nilai_bobot' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G013',
                'nama_gejala' => 'Mual dan muntah',
                'nilai_bobot' => 0.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G014',
                'nama_gejala' => 'Denyut jantung tidak teratur',
                'nilai_bobot' => 0.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_gejala' => 'G015',
                'nama_gejala' => 'Sesak napas',
                'nilai_bobot' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('tabel_data_gejala')->insert($dataGejala);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_data_gejala');
    }
};
