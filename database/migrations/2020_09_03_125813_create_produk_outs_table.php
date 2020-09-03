<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_outs', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('nama');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('id_koperasi');
            $table->string('type_keluar');
            $table->string('kode_type');
            $table->string('kasir');
            $table->integer('subharga');
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
        Schema::dropIfExists('produk_outs');
    }
}
