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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_petugas');
            $table->string('nisn');
            $table->string('nama');
            $table->integer('tgl_bayar')->nullable();
            $table->string('bulan_dibayar');
            $table->string('tahun_dibayar')->nullable();
            $table->integer('id_spp');
            $table->integer('jumlah_bayar');
            $table->integer('sisa_bayar');
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
        Schema::dropIfExists('pembayaran');
    }
};
