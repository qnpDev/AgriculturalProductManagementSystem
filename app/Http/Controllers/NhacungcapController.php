<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\NhacungcapAddRequest;
use App\Http\Requests\NhacungcapEditRequest;
use App\Nhacungcap;

use DB;

class NhacungcapController extends Controller
{
    public function getList()
    {
        $data = DB::table('nhacungcap')->orderBy('id','DESC')->get();
    	return view('backend.nhacungcap.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	return view('backend.nhacungcap.them');
    }

    public function postAdd(NhacungcapAddRequest $request)
    {
    	$nhacungcap = new Nhacungcap;
        $nhacungcap->nhacungcap_ten = $request->txtNCCName;
        $nhacungcap->nhacungcap_dia_chi = $request->txtNCCAdress;
        $nhacungcap->nhacungcap_sdt = $request->txtNCCPhone;
        $nhacungcap->save();
        return redirect()->route('admin.nhacungcap.list')->with(['flash_level'=>'success','flash_message'=>'Thêm nhà cung cấp thành công!!!']);
    }

    public function getDelete($id)
    {
        $nhacungcap = DB::table('nhacungcap')->where('id',$id)->delete();
        return redirect()->route('admin.nhacungcap.list')->with(['flash_level'=>'success','flash_message'=>'Xóa nhà cung cấp thành công!!!']);
    }

    public function getEdit($id)
    {
    	$data = DB::table('nhacungcap')->where('id',$id)->first();
        return view('backend.nhacungcap.sua',compact('data'));
    }

    public function postEdit(NhacungcapEditRequest $request, $id)
    {
        $nhacungcap = DB::table('nhacungcap')->where('id',$id)->update([
            'nhacungcap_ten'=> $request->txtNCCName,
            'nhacungcap_dia_chi' => $request->txtNCCAdress,
            'nhacungcap_sdt' => $request->txtNCCPhone
            ]);
        return redirect()->route('admin.nhacungcap.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa nhà cung cấp thành công!!!']);
    }
}
