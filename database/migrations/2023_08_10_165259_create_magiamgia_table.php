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
            $table->string('maGiamGia', 20)->unique();
            $table->string('chiTiet')->nullable();
            $table->boolean('loaiMa')->comment('1 giam theo %, 0 giam truc tiep so tien');
            $table->double('giaTri', 10, 3);
            $table->double('dieuKien', 10, 3)->nullable();
            $table->integer('luotSuDung')->nullable();
            $table->integer('gioiHan')->nullable();
            $table->dateTime('ngayBatDau')->nullable();
            $table->dateTime('ngayKetThuc')->nullable();
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
