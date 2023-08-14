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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->integer('idSP')->autoIncrement();
            $table->integer('idLoai')->foreignId('idLoai')->references('idLoai')->on('loaisanpham');
            $table->integer('idTH')->foreignId('idTH')->references('idTH')->on('thuonghieusp');
            $table->string('tenSP');
            $table->string('slug');
            $table->double('giaSP', 10, 0);
            $table->string('urlHinh');
            $table->text('moTa')->nullable();
            $table->dateTime('ngayDang')->useCurrent();
            $table->integer('soLuotXem')->nullable();
            $table->integer('soLuotMua')->nullable();
            $table->boolean('anHien')->default(1)->comment('1 hien, 0 an');
            $table->boolean('noiBat')->default(1)->comment('1 noibat, 0 k noibat');
            $table->integer('discount')->default(0);
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }

};
