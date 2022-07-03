<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('tabel_data_riwayat_pasien', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_jam_diagnosa');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->longText('tabel_gejala');
            $table->longText('tabel_diagnosa');
            $table->longText('hasil_diagnosa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_data_riwayat_pasien');
    }
};
