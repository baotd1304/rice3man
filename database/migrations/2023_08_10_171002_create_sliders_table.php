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
        Schema::create('sliders', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('tenSlider');
            $table->string('hinhSlider');
            $table->dateTime('ngayDang')->useCurrent();
            $table->integer('nhom')->nullable();
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
        Schema::dropIfExists('sliders');
    }
};
