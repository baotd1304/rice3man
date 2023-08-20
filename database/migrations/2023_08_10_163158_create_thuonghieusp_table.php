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
        Schema::create('thuonghieusp', function (Blueprint $table) {
            $table->integer('idTH')->autoIncrement();
            $table->string('tenTH', 100);
            $table->string('slug')->unique();
            $table->string('urlHinhTH');
            $table->integer('thuTu');
            $table->boolean('anHien')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thuonghieusp');
    }
};
