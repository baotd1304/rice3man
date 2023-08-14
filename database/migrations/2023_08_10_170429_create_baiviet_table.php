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
        Schema::create('baiviet', function (Blueprint $table) {
            $table->integer('idBV')->autoIncrement();
            $table->string('tieuDe');
            $table->string('thumbNail');
            $table->text('noiDung');
            $table->string('tacGia', 50)->nullable();
            $table->dateTime('ngayDang')->useCurrent();
            $table->boolean('anHien')->default(1)->comment('1 hien thi, 0 an');
            $table->boolean('noiBat')->default(1)->comment('1 noibat, 0 k noibat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
};
