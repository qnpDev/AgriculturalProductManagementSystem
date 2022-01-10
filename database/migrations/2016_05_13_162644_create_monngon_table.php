<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonngonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monngon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('monngon_tieu_de');
            $table->string('monngon_url');
            $table->longText('monngon_tom_tat');
            $table->longText('monngon_noi_dung');
            $table->integer('monngon_luot_xem');
            $table->string('monngon_anh');
            $table->integer('monngon_da_xoa');
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
        Schema::drop('monngon');
    }
}
