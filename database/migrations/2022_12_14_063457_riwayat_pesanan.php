<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatPesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan')->nullable();
            $table->string('nama_menu')->nullable();
            $table->string('jumlah_menu')->nullable();
            $table->string('harga')->nullable();
            $table->string('uang_dibayar')->nullable();
            $table->string('uang_dikembalikan')->nullable();
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
        //
    }
}
