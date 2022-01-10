<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhsanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhsanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hinhsanpham_ten');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('sanpham')->onDelete('cascade');
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
        Schema::drop('hinhsanpham');
    }
}

