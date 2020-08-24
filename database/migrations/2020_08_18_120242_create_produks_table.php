<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('unit');
            $table->string('curr');
            $table->float('harga_jual');
            $table->float('harga_beli');
            $table->string('disc');
            $table->integer('stok');
            $table->string('barcode');
            $table->string('status');
            $table->string('expired');
            $table->string('print_label');
            $table->string('ganti_harga');
            $table->string('kategori');
            $table->text('keterangan');
            $table->string('untung');
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
        Schema::dropIfExists('produks');
    }
}
