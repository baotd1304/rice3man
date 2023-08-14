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
        Schema::create('magiamgia', function (Blueprint $table) {
            $table->integer('idMGG')->autoIncrement();
            $table->string('maGiamGia', 50);
            $table->string('chiTiet')->nullable();
            $table->dateTime('ngayBatDau');
            $table->dateTime('ngayKetThuc');
            $table->boolean('loaiMa')->comment('1 giam theo %, 0 giam truc tiep so tien');
            $table->double('giaTri', 10, 3);
            $table->boolean('hoatDong')->default(1)->comment('1 active, 0 inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magiamgia');
    }
};
