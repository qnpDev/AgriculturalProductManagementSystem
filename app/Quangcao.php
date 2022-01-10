<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quangcao extends Model
{
    protected $table="quangcao";

    protected $fillable = ['quangcao_anh','quangcao_trang_thai'];

	public $timestamps = false;
}
