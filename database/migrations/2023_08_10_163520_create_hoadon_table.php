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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->integer('idHD')->autoIncrement();
            $table->integer('idND')->foreignId('idND')->references('id')->on('users');
            $table->integer('idMGG')->foreignId('idMGG')->references('idMGG')->on('magiamgia');
            $table->string('tenNguoiNhan', 100);
            $table->string('email');
            $table->string('soDienThoai', 20);
            $table->string('diaChi');
            $table->double('tongTien', 10, 0);
            $table->dateTime('ngayMua')->useCurrent();
            $table->boolean('thanhToan')->comment('1 da thanh toan, 0 chua thanh toan');
            $table->boolean('trangThai')->comment('1 da giao hang, 0 chua giao hang');
            $table->tinyInteger('isDone')->default(0)->comment('0 chua xac nhan, 1 da xac nhan, 2 hoan thanh, 3 huy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
};
