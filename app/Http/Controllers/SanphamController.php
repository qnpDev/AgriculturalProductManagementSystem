<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\SanphamAddRequest;
use App\Http\Requests\SanphamEditRequest;
use App\Sanpham;
use App\Hinhsanpham;
use App\Donvitinh;
use DB;
use Request;
use Input,File;
class SanphamController extends Controller
{
    public function getList()
    {
        $data1 = DB::table('sanpham')
            
            ->get();
            // print_r($data1);
        foreach ($data1 as $item) {
            $data2 = DB::table('sanphamkhuyenmai')->where('sanpham_id',$item->id)->get();
            // print_r($data2);
            foreach ($data2 as $val1) {
                if (!is_null($val1)) {
                $data3 = DB::table('khuyenmai')->where('id',$val1->khuyenmai_id)->first();
                // print_r($data3);
                // $data3 = DB::table('khuyenmai')->where('id',$data2->khuyenmai_id)->first();
                if ($data3->khuyenmai_tinh_trang == 0) {
                    $u = DB::table('sanpham')
                        ->where('id',$item->id)
                        ->update(['sanpham_khuyenmai' => 0 ]);
                    }

                else{
                    $u = DB::table('sanpham')
                        ->where('id',$item->id)
                        ->update(['sanpham_khuyenmai' => 1 ]);
                }
                // print_r($u);
                }
            }   
        }
        $data = DB::table('sanpham')
            ->orderBy('id','DESC')->get();
    	return view('backend.sanpham.danhsach',compact('data'));
    }

    public function getAdd()
    {
        $units = DB::table('donvitinh')->get();
        foreach ($units as $key => $val) {
            $unit[] = ['id' => $val->id, 'name'=> $val->donvitinh_ten];
        }
        $cates = DB::table('loaisanpham')->get();
        foreach ($cates as $key => $val) {
            $cate[] = ['id' => $val->id, 'name'=> $val->loaisanpham_ten];
        }
    	return view('backend.sanpham.them',compact('cate','unit'));
    }

    public function postAdd(SanphamAddRequest $request)
    {
        $filename=$request->file('txtSPImage')->getClientOriginalName();
        $request->file('txtSPImage')->move(
            base_path() . '/resources/upload/sanpham/', $filename
        );
    	$sanpham = new Sanpham;
        $sanpham->sanpham_ky_hieu   = $request->txtSPSignt;
        $sanpham->sanpham_ten           = $request->txtSPName;
        $sanpham->sanpham_url           = Replace_TiengViet($request->txtSPName);
        $sanpham->sanpham_mo_ta = $request->txtSPIntro;
        $sanpham->sanpham_anh = $filename;
        $sanpham->loaisanpham_id = $request->txtSPCate;
        $sanpham->donvitinh_id = $request->txtSPUnit;
       
        $sanpham->sanpham_khuyenmai = 0;
        $sanpham->save();
        
        $files =[];
        if ($request->file('txtSPImage1')) {
            $files[] = $request->file('txtSPImage1');
        }
        if ($request->file('txtSPImage2')) {
            $files[] = $request->file('txtSPImage2');
        } 
        if ($request->file('txtSPImage3')) {
            $files[] = $request->file('txtSPImage3');
        }
        if ($request->file('txtSPImage4')) {
            $files[] = $request->file('txtSPImage4');
        } 
        if ($request->file('txtSPImage5')) {
            $files[] = $request->file('txtSPImage5');
        }

        $names =[];   

        foreach ($files as $file) {
            if(!empty($file)){
                $filename=$file->getClientOriginalName();
                $file->move(
                    base_path().'/resources/upload/chitietsanpham/', $filename
                );

                $hinh = new Hinhsanpham; 
                $hinh->hinhsanpham_ten = $filename;
                $hinh->sanpham_id = $sanpham->id;
                $hinh->save();
            }
        }

        return redirect()->route('admin.sanpham.list')->with(['flash_level'=>'success','flash_message'=>'Thêm loại sản phẩm thành công!!!']);
    }

    public function getDelete($id)
    {   
        $binhluan = DB::table('binhluan')->where('sanpham_id',$id)->get();
        foreach ($binhluan as $val) {
            
            DB::table('binhluan')->where('sanpham_id',$id)->delete();
        }
        DB::table('lohang')->where('sanpham_id',$id)->delete();
        $chitiet = DB::table('hinhsanpham')->where('sanpham_id',$id)->get();
        foreach ($chitiet as $val) {
            $image = 'resources/upload/chitietsanpham/'.$val->hinhsanpham_ten;
            File::delete($image);
            DB::table('hinhsanpham')->where('sanpham_id',$id)->delete();
        }
    	$sanpham = DB::table('sanpham')->where('id',$id)->first();
        $img = 'resources/upload/sanpham/'.$sanpham->sanpham_anh;
        File::delete($img);
        DB::table('sanpham')->where('id',$id)->delete();

        return redirect()->route('admin.sanpham.list')->with(['flash_level'=>'success','flash_message'=>'Xóa loại sản phẩm thành công!!!']);
    }

    public function getEdit($id)
    {
    	$units = DB::table('donvitinh')->get();
        foreach ($units as $key => $val) {
            $unit[] = ['id' => $val->id, 'name'=> $val->donvitinh_ten];
        }
        $cates = DB::table('loaisanpham')->get();
        foreach ($cates as $key => $val) {
            $cate[] = ['id' => $val->id, 'name'=> $val->loaisanpham_ten];
        }
        $sanpham = DB::table('sanpham')->where('id',$id)->first();
        $images = DB::table('hinhsanpham')->where('sanpham_id',$id)->get();
        return view('backend.sanpham.sua',compact('cate','unit','sanpham','id','images'));
    }

    public function postEdit($id, SanphamEditRequest $request)
    {
        $sanpham = Sanpham::find($id);
        $sanpham->sanpham_ky_hieu   = Request::input('txtSPSignt');
        $sanpham->sanpham_ten       = Request::input('txtSPName');
        $sanpham->sanpham_url       = Replace_TiengViet(Request::input('txtSPName'));
        $sanpham->sanpham_mo_ta     = Request::input('txtSPIntro');
        $sanpham->loaisanpham_id    = Request::input('txtSPCate');
        $sanpham->donvitinh_id      = Request::input('txtSPUnit');
       
        $img_current = 'resources/upload/sanpham/'.Request::input('fImageCurrent');
        if (!empty(Request::file('fImage'))) {
             $filename=Request::file('fImage')->getClientOriginalName();
             $sanpham->sanpham_anh = $filename;
             Request::file('fImage')->move(base_path() . '/resources/upload/sanpham/', $filename);
             File::delete($img_current);
        } else {
            echo "File empty";
        }

        if(!empty(Request::file('fEditImage'))) {
            foreach (Request::file('fEditImage') as $file) {
                $detail_img = new Hinhsanpham();
                if (isset($file)) {
                    $detail_img->hinhsanpham_ten = $file->getClientOriginalName();
                    $detail_img->sanpham_id = $id;
                    $file->move('resources/upload/chitietsanpham/', $file->getClientOriginalName());
                    $detail_img->save();
                } 
          }
        }

        $sanpham->save();

        return redirect()->route('admin.sanpham.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa sản phẩm thành công!!!']);
    }

    public function delImage($id){
        if (Request::ajax()) {
            $idHinh = (int)Request::get('idHinh');
            $image_detail = Hinhsanpham::find($idHinh);
            if(!empty($image_detail)) {
                $img = 'resources/upload/chitietsanpham/'.$image_detail->hinhsanpham_ten;
                //print_r($img);
                //if(File::isFile($img)) {
                    File::delete($img);
                //}
                $image_detail->delete();
            }
            return "Oke";
        }
    }
}
