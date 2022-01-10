<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NhomAddRequest;
use App\Http\Requests\NhomEditRequest;
use App\Nhom;
use DB;
use Input,File;

class NhomController extends Controller
{
    public function getList()
    {
    	$data = DB::table('nhom')->get();
    	return view('backend.nhom.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	return view('backend.nhom.them');
    }

    public function postAdd(NhomAddRequest $request)
    {
    	$nhom = new Nhom;
        $imageName = $request->file('fImage')->getClientOriginalName();

        $request->file('fImage')->move(
            base_path() . '/resources/upload/nhom/', $imageName
        );
    	$nhom->nhom_ten   = $request->txtNName;
    	$nhom->nhom_url   = Replace_TiengViet($request->txtNName);
    	$nhom->nhom_mo_ta = $request->txtNIntro;
        $nhom->nhom_anh = $request->imageName;
    	$nhom->save();
    	return redirect()->route('admin.nhom.list')->with(['flash_level'=>'success','flash_message'=>'Thêm nhóm thực phẩm thành công!!!']);
    }

    public function getEdit($id) {
    	$nhom = DB::table('nhom')->where('id',$id)->first();
    	return view('backend.nhom.sua',compact('nhom'));
    }

    public function postEdit(NhomEditRequest $request, $id)
    {
        $fImage = $request->fImage;
        $img_current = 'resources/upload/nhom/'.$request->fImageCurrent;
        if (!empty($fImage )) {
             $filename=$fImage ->getClientOriginalName();
             DB::table('nhom')->where('id',$id)
                            ->update([
                                'nhom_ten'   => $request->txtNName,
                                'nhom_url'   => Replace_TiengViet($request->txtNName),
                                'nhom_mo_ta' => $request->txtNIntro,
                                'nhom_anh' => $filename
                                ]);
             $fImage ->move(base_path() . '/resources/upload/nhom/', $filename);
             File::delete($img_current);
        } else {
            DB::table('nhom')->where('id',$id)
                            ->update([
                                'nhom_ten'   => $request->txtNName,
                                'nhom_url'   => Replace_TiengViet($request->txtNName),
                                'nhom_mo_ta' => $request->txtNIntro
                                ]);
        }

    	return redirect()->route('admin.nhom.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật nhóm thực phẩm thành công!!!']);
    }

    public function getDelete($id)
	{
        $nhom = DB::table('nhom')->where('id',$id)->first();
        $img = 'resources/upload/nhom/'.$nhom->nhom_anh;
        File::delete($img);
		DB::table('nhom')->where('id',$id)->delete();
        return redirect()->route('admin.nhom.list')->with(['flash_level'=>'success','flash_message'=>'Xóa loại sản phẩm thành công!!!']);
	}
}
