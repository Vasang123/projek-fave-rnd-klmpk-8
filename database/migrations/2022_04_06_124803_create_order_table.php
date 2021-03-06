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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_user');
            $table->integer('kode_pos');
            $table->string('alamat');
            $table->integer('nomor_invoice');
            $table->integer('jumlah_pesanan');
            $table->float('total_harga');
            $table->enum('status', ['Accepted', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('order');
    }
};
