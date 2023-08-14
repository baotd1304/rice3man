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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->integer('idBL')->autoIncrement();
            $table->integer('idSP')->foreignId('idSP')->references('idSP')->on('sanpham');
            $table->integer('idND')->foreignId('idND')->references('id')->on('users');
            $table->text('noiDung');
            $table->dateTime('ngayBL')->useCurrent();
            $table->boolean('anHien')->default(1)->comment('1 hien thi, 0 an');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
};
