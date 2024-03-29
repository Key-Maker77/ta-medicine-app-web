<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabibs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tabib');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('gambar');
            $table->string('nomor_sertifikasi');
            $table->string('keahlian');
            $table->string('nomor_hp');
            $table->string('status');
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
        Schema::dropIfExists('tabibs');
    }
}
