<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MonngonEditRequest;
use App\Http\Requests\MonngonAddRequest;
use App\Monngon;
use App\Sanpham;
use App\Nguyenlieu;
use DB;
use Input,File;

class MonngonController extends Controller
{
    public function getList()
    {
        $data =  DB::table('monngon')->orderBy('id','DESC')->get();
    	return view('backend.monngon.danhsach',compact('data'));
    }

    public function getAdd()
    {
        $data = DB::table('sanpham')->orderBy('id','DESC')->get();
    	return view('backend.monngon.them',compact('data'));
    }

    public function postAdd(MonngonAddRequest $request)
    {
        // $request->file('fImage')->getClientOriginalName();
        $filename=$request->file('fImage')->getClientOriginalName();
        $request->file('fImage')->move(
            base_path() . '/resources/upload/monngon/', $filename
        );
    	$monngon = new Monngon;
        $monngon->monngon_tieu_de   = $request->txtMNTittle;
        $monngon->monngon_tom_tat           = $request->txtMNResum;
        $monngon->monngon_noi_dung = $request->txtMNContent;
        $monngon->monngon_url   = Replace_TiengViet($request->txtMNTittle);
        $monngon->monngon_luot_xem= 1;
        $monngon->monngon_anh= $filename;
        $monngon->monngon_da_xoa= 1;
        $monngon->save();

        $data = $request->input('products',[]);
        foreach ($data as  $item) {
            //print_r($item);
            $nguyenlieu = new Nguyenlieu;
            $nguyenlieu->sanpham_id = $item;
            $nguyenlieu->monngon_id = $monngon->id;
            $nguyenlieu->save();
        }
        return redirect()->route('admin.monngon.list')->with(['flash_level'=>'success','flash_message'=>'Đăng tin thành công!!!']);
    }

    public function getDelete($id)
    {
        $monngon = DB::table('monngon')->where('id',$id)->first();
        $img = 'resources/upload/monngon/'.$monngon->monngon_anh;
        File::delete($img);
    	DB::table('monngon')->where('id',$id)->delete();
        return redirect()->route('admin.monngon.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
    }

    public function getEdit($id)
    {
    	$monngon = DB::table('monngon')->where('id',$id)->first();
        $nguyenlieu = DB::table('nguyenlieu')->select('sanpham_id')->where('monngon_id',$id)->get();
        foreach ($nguyenlieu as $key => $val) {
            $nglieu[] = $val->sanpham_id;
        }
        if (!empty($nglieu)) {
        
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',$nglieu)
                    ->get();
        } else {
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',['0'])
                    ->get();
        }

        if (empty($nglieu)) {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',['0'])
                    ->get();
        } else {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',$nglieu)
                    ->get();
        }
        return view('backend.monngon.sua',compact('monngon','sanpham1','sanpham2'));
    }

    public function postEdit(MonngonEditRequest $request,$id)
    {
    	$fImage = $request->fImage;
        $img_current = '/resources/upload/monngon/'.$request->fImageCurrent;
        if (!empty($fImage )) {
             $filename=$fImage ->getClientOriginalName();
             DB::table('monngon')->where('id',$id)
                            ->update([
                                'monngon_tieu_de'   => $request->txtMNTittle,
                                'monngon_tom_tat'           => $request->txtMNResum,
                                'monngon_noi_dung' => $request->txtMNContent,
                                'monngon_url'   => Replace_TiengViet($request->txtMNTittle),
                                'monngon_anh'=> $filename
                                ]);
             $fImage ->move(base_path() . '/resources/upload/monngon/', $filename);
             File::delete($img_current);
        } else {
            DB::table('monngon')->where('id',$id)
                            ->update([
                                'monngon_tieu_de'   => $request->txtMNTittle,
                                'monngon_tom_tat'           => $request->txtMNResum,
                                'monngon_noi_dung' => $request->txtMNContent,
                                'monngon_url'   => Replace_TiengViet($request->txtMNTittle)
                                ]);
        }
        
        DB::table('nguyenlieu')->where('monngon_id',$id)->delete();
        $data = $request->input('products',[]);
        foreach ($data as  $item) {
            $nguyenlieu = new Nguyenlieu;
            $nguyenlieu->sanpham_id = $item;
            $nguyenlieu->monngon_id = $id;
            $nguyenlieu->save();
        }
        return redirect()->route('admin.monngon.list')->with(['flash_level'=>'success','flash_message'=>'Edit thành công!!!']);
    }

    public function getEditMaterial($id)
    {
        $nguyenlieu = DB::table('nguyenlieu')->select('sanpham_id')->where('monngon_id',$id)->get();
        foreach ($nguyenlieu as $key => $val) {
            $nglieu[] = $val->sanpham_id;
        }
        if (!empty($nglieu)) {
        
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',$nglieu)
                    ->get();
        } else {
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',['0'])
                    ->get();
        }

        if (empty($nglieu)) {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',['0'])
                    ->get();
        } else {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',$nglieu)
                    ->get();
        }
        return view('backend.monngon.suanguyenlieu',compact('sanpham1','sanpham2'));
    }

    public function postEditMaterial(Request $request,$id)
    {
        DB::table('nguyenlieu')->where('monngon_id',$id)->delete();
        $data = $request->input('products',[]);
        foreach ($data as  $item) {
            $nguyenlieu = new Nguyenlieu;
            $nguyenlieu->sanpham_id = $item;
            $nguyenlieu->monngon_id = $id;
            $nguyenlieu->save();
        }
        return redirect()->route('admin.monngon.list')->with(['flash_level'=>'success','flash_message'=>'Edit thành công!!!']);
    }

    public function getAddMaterial()
    {
        $sanpham = DB::table('sanpham')->orderBy('id','DESC')->get();
        return view('backend.monngon.themnguyenlieu',compact('sanpham'));
    }

    public function postAddMaterial(Request $request)
    {
        $data = $request->input('products',[]);
        foreach ($data as  $item) {
            //print_r($item);
            $nguyenlieu = new Nguyenlieu;
            $nguyenlieu->sanpham_id = $item;
            $nguyenlieu->monngon_id = $request->txtID;
            $nguyenlieu->save();
        }
        return redirect()->route('admin.monngon.list')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }

    public function listMat($id)
    {
        $data =  DB::table('nguyenlieu')->where('monngon_id',$id)->orderBy('id','DESC')->get();
        return view('backend.monngon.danhsachnglieu',compact('data'));
    }
}
