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
        Schema::create('chitiethoadon', function (Blueprint $table) {
            $table->integer('idCTHD')->autoIncrement();
            $table->integer('idHD')->foreignId('idHD')->references('idHD')->on('hoadon');
            $table->integer('idSP')->foreignId('idSP')->references('idSP')->on('sanpham');
            $table->string('tenSP');
            $table->integer('soLuong');
            $table->double('giaSP', 10, 0);
            $table->string('urlHinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiethoadon');
    }
};
