<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lohang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lohang_ky_hieu',200);
            $table->integer('lohang_han_su_dung');
            $table->decimal('lohang_gia_mua_vao',10,2);
            $table->decimal('lohang_gia_ban_ra',10,2);
            $table->integer('lohang_so_luong_sp');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('sanpham')->onUpdate('cascade');
            $table->integer('nhacungcap_id')->unsigned();
            $table->foreign('nhacungcap_id')->references('id')->on('nhacungcap')->onUpdate('cascade');
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
        Schema::drop('lohang');
    }
}

