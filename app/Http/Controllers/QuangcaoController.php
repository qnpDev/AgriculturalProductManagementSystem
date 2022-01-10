<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuangcaoAddRequest;
use App\Http\Requests\QuangcaoEditRequest;
use App\Quangcao;
use DB;
use Input,File;

class QuangcaoController extends Controller
{
    public function getList()
    {
    	$data = DB::table('quangcao')->get();
    	return view('backend.quangcao.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	return view('backend.quangcao.them');
    }

    public function postAdd(QuangcaoAddRequest $request)
    {
    	$quangcao = new Quangcao;
        $imageName = $request->file('fImage')->getClientOriginalName();

        $request->file('fImage')->move(
            base_path() . '/resources/upload/quangcao/', $imageName
        );
    	$quangcao->quangcao_trang_thai   = $request->txtNName;
        $quangcao->quangcao_anh = $imageName;
    	$quangcao->save();
    	return redirect()->route('admin.quangcao.list')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }

    public function getEdit($id) {
    	$quangcao = DB::table('quangcao')->where('id',$id)->first();
    	return view('backend.quangcao.sua',compact('quangcao'));
    }

    public function postEdit(QuangcaoEditRequest $request, $id)
    {
        $fImage = $request->fImage;
        $img_current = 'resources/upload/quangcao/'.$request->fImageCurrent;
        if (!empty($fImage )) {
             $filename=$fImage ->getClientOriginalName();
             DB::table('quangcao')->where('id',$id)
                            ->update([
                                'quangcao_trang_thai'   => $request->txtNName,
                                'quangcao_anh' => $filename
                                ]);
             $fImage ->move(base_path() . '/resources/upload/quangcao/', $filename);
             File::delete($img_current);
        } else {
            DB::table('quangcao')->where('id',$id)
                            ->update([
                                'quangcao_trang_thai'   => $request->txtNName
                                ]);
        }

    	return redirect()->route('admin.quangcao.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật thành công!!!']);
    }

    public function getDelete($id)
	{
        $quangcao = DB::table('quangcao')->where('id',$id)->first();
        $img = 'resources/upload/quangcao/'.$quangcao->quangcao_anh;
        File::delete($img);
		DB::table('quangcao')->where('id',$id)->delete();
        return redirect()->route('admin.quangcao.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
	}

	public function getChance(Request $request,$id,$status)
	{
		// $status = $request->txtChance;
		print_r($status);
		DB::table('quangcao')
			->where('id',$id)
            ->update([
                'quangcao_trang_thai'   => $status
                ]);
        return redirect()->route('admin.quangcao.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật trạng thái thành công!!!']);
	}
}
