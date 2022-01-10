<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TuyendungAddRequest;
use App\Http\Requests\TuyendungEditRequest;
use App\Tuyendung;

use DB;
use Input,File;

class TuyendungController extends Controller
{
    public function getList()
    {
        $data =  DB::table('tuyendung')->orderBy('id','DESC')->get();
    	return view('backend.tuyendung.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	return view('backend.tuyendung.them');
    }

    public function postAdd(TuyendungAddRequest $request)
    {
        $tuyendung = new Tuyendung;

    	$imageName = $request->file('fImage')->getClientOriginalName();

        $request->file('fImage')->move(
            base_path() . '/resources/upload/tuyendung/', $imageName
        );

        $tuyendung->tuyendung_tieu_de = $request->txtTDTittle;
        $tuyendung->tuyendung_url = Replace_TiengViet($request->txtTDTittle);
        $tuyendung->tuyendung_mo_ta = $request->txtTDIntro;
        $tuyendung->tuyendung_thoi_gian = $request->txtTDDate;
        $tuyendung->tuyendung_lien_he = $request->txtTDContact;
        $tuyendung->tuyendung_anh = $imageName;
        $tuyendung->save();
        return redirect()->route('admin.tuyendung.list')->with(['flash_level'=>'success','flash_message'=>'Thêm tin tuyển dụng thành công!!!']);
    }

    public function getDelete($id)
    {
        $tuyendung = DB::table('tuyendung')->where('id',$id)->first();
        $img = 'resources/upload/tuyendung/'.$tuyendung->tuyendung_anh;
        File::delete($img);
    	DB::table('tuyendung')->where('id',$id)->delete();
        return redirect()->route('admin.tuyendung.list')->with(['flash_level'=>'success','flash_message'=>'Del tin tuyển dụng thành công!!!']);
    }

    public function getEdit($id)
    {
    	$tuyendung = DB::table('tuyendung')->where('id',$id)->first();
        return view('backend.tuyendung.sua',compact('tuyendung'));
    }

    public function postEdit(TuyendungEditRequest $request, $id)
    {
    	$fImage = $request->fImage;
        $img_current = 'resources/upload/tuyendung/'.$request->fImageCurrent;
        if (!empty($fImage )) {
             $filename=$fImage ->getClientOriginalName();
             DB::table('tuyendung')->where('id',$id)
                            ->update([
                                'tuyendung_tieu_de' => $request->txtTDTittle,
                                'tuyendung_url' => Replace_TiengViet($request->txtTDTittle),
                                'tuyendung_mo_ta' => $request->txtTDIntro,
                                'tuyendung_thoi_gian' => $request->txtTDDate,
                                'tuyendung_lien_he' => $request->txtTDContact,
                                'tuyendung_anh' => $filename
                                ]);
             $fImage ->move(base_path() . '/resources/upload/tuyendung/', $filename);
             File::delete($img_current);
        } else {
            DB::table('tuyendung')->where('id',$id)
                            ->update([
                                'tuyendung_tieu_de' => $request->txtTDTittle,
                                'tuyendung_url' => Replace_TiengViet($request->txtTDTittle),
                                'tuyendung_mo_ta' => $request->txtTDIntro,
                                'tuyendung_thoi_gian' => $request->txtTDDate,
                                'tuyendung_lien_he' => $request->txtTDContact
                                ]);
        }

        return redirect()->route('admin.tuyendung.list')->with(['flash_level'=>'success','flash_message'=>'Edit tin tuyển dụng thành công!!!']);
    }
}
