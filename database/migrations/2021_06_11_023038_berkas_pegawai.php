<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BerkasPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nm_berkas');
            $table->string('jns_berkas');
            $table->date('tgl_upload');
            $table->date('tgl_verif');
            $table->string('stts_berkas');
            $table->string('keterangan');
            $table->string('nip');
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
        Schema::dropIfExists('berkas_pegawai');
    }
}
