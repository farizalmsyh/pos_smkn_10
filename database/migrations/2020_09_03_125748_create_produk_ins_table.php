<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_ins', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('nama');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('id_koperasi');
            $table->string('type_masuk');
            $table->string('pj');
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
        Schema::dropIfExists('produk_ins');
    }
}
