<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loaisanpham_ten', 200);
            $table->string('loaisanpham_ten_gia',200);
            $table->longText('loaisanpham_mo_ta')->nullable();
            $table->integer('loaisanpham_da_xoa');
            $table->integer('nhom_id')->unsigned();
            $table->foreign('nhom_id')->references('id')->on('nhom')->onUpdate('cascade');
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
        Schema::drop('loaisanpham');
    }
}
