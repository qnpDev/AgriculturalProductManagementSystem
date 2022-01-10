<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Binhluan;

class BinhluanController extends Controller
{
    public function getList()
    {
    	$data = DB::table('binhluan')->orderBy('id','DESC')->get();
        $data1 = DB::table('binhluan')->where('binhluan_trang_thai',1)->orderBy('id','DESC')->get();
        $data2 = DB::table('binhluan')->where('binhluan_trang_thai',0)->orderBy('id','DESC')->get();
    	return view('backend.binhluan.danhsach',compact('data','data1','data2'));
    }

    public function getDelete($id)
    {
    	DB::table('binhluan')->where('id',$id)->delete();
        return redirect()->route('admin.binhluan.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
    }

    public function getEdit($id)
    {
    	DB::table('binhluan')
    		->where('id',$id)
    		->update(['binhluan_trang_thai'=>1]);
    	return redirect()->route('admin.binhluan.list')->with(['flash_level'=>'success','flash_message'=>'Bình luận đã được chấp nhận!!!']);
    }

    public function getEdit1($id)
    {
        DB::table('binhluan')
            ->where('id',$id)
            ->update(['binhluan_trang_thai'=>0]);
        return redirect()->route('admin.binhluan.list')->with(['flash_level'=>'success','flash_message'=>'Bình luận đã bị hủy chấp nhận!!!']);
    }
}
