<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $table = "khachhang";

    protected $fillable = ['khachhang_ten','khachhang_dia_chi','khachhang_sdt','khachhang_email','user_id'];

	public $timestamps = false;
}
