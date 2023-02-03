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
        Schema::create('ktp_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->integer('jenis_kelamin')->default(1); //1 = laki laki, 2 = perempuan
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('golongan_darah');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
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
        Schema::dropIfExists('ktp_pasiens');
    }
};
