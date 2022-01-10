<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monngon extends Model
{
    protected $table = 'monngon';

	protected $fillable = ['monngon_ten_gia','monngon_tieu_de','monngon_tom_tat','monngon_noi_dung','monngon_luot_xem','monngon_da_xoa','monngon_anh'];

	public $timestamps = true;
}
