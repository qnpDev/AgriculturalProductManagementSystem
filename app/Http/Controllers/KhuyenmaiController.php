<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\KhuyenmaiAddRequest;
use App\Http\Requests\KhuyenmaiEditRequest;
use App\Sanpham;
use App\Khuyenmai;
use App\Sanphamkhuyenmai;
use DB;
use File,Input;

class KhuyenmaiController extends Controller
{
    public function getList()
    {
        $data1 = DB::table('khuyenmai')->orderBy('id','DESC')->get();
        foreach ($data1 as  $item) {
            $today  = date("Y-m-d"); // Năm/Tháng/Ngày
            $ngaybd =  date("Y-m-d", strtotime("$item->created_at")); // Năm/Tháng/Ngày
            $ngaykt = date("Y-m-d",strtotime($ngaybd . "+ $item->khuyenmai_thoi_gian  day"));
          
             if ( (strtotime($today) >= strtotime($ngaybd)) && (strtotime($today) <= strtotime($ngaykt)) )
                {      
                    DB::table('khuyenmai')
                        ->where('id',$item->id)
                        ->update([
                                'khuyenmai_tinh_trang' => 1
                            ]);
                } else{
                    DB::table('khuyenmai')
                        ->where('id',$item->id)
                        ->update([
                                'khuyenmai_tinh_trang' => 0
                            ]);
                }
                }
                
        $data = DB::table('khuyenmai')->orderBy('id','DESC')->get();
    	return view('backend.khuyenmai.danhsach',compact('data'));
    }

    public function getAdd()
    {
         $data = DB::table('sanpham')->orderBy('id','DESC')->get();
    	return view('backend.khuyenmai.them',compact('data'));
    }

    public function postAdd(KhuyenmaiAddRequest $request)
    {
        $request->file('fImage')->getClientOriginalName();
    	$filename=$request->file('fImage')->getClientOriginalName();
        $request->file('fImage')->move(
            base_path() . '/resources/upload/khuyenmai/', $filename
        );
        $khuyenmai = new Khuyenmai;
        $khuyenmai->khuyenmai_tieu_de   = $request->txtKMTittle;
        $khuyenmai->khuyenmai_noi_dung = $request->txtKMContent;
        $khuyenmai->khuyenmai_url   = Replace_TiengViet($request->txtKMTittle);
        $khuyenmai->khuyenmai_phan_tram   = $request->txtKMPer;
        $khuyenmai->khuyenmai_thoi_gian = $request->txtKMTime;
        $khuyenmai->khuyenmai_anh= $filename;
        $khuyenmai->khuyenmai_tinh_trang= 1;
        $khuyenmai->save();

        $data = $request->input('products',[]);
        foreach ($data as  $item) {
            DB::table('sanpham')
                ->where('id',$item)
                ->update([
                        'sanpham_khuyenmai'=> 1,
                    ]);
            //print_r($item);
            $sanphamkhuyenmai = new Sanphamkhuyenmai;
            $sanphamkhuyenmai->sanpham_id = $item;
            $sanphamkhuyenmai->khuyenmai_id = $khuyenmai->id;
            $sanphamkhuyenmai->save();
            
        }
        return redirect()->route('admin.khuyenmai.list')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }

    public function getDelete($id)
    {
        $khuyenmai = DB::table('khuyenmai')->where('id',$id)->first();
        $img = 'resources/upload/khuyenmai/'.$khuyenmai->khuyenmai_anh;
        File::delete($img);
    	DB::table('khuyenmai')->where('id',$id)->delete();
        return redirect()->route('admin.khuyenmai.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
    }

    public function getEdit($id)
    {
    	$khuyenmai = DB::table('khuyenmai')->where('id',$id)->first();
        $spkhuyenmai = DB::table('sanphamkhuyenmai')->select('sanpham_id')->where('khuyenmai_id',$id)->get();
        foreach ($spkhuyenmai as $key => $val) {
            $khmai[] = $val->sanpham_id;
        }
        if (!empty($khmai)) {
        
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',$khmai)
                    ->get();
        } else {
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',['0'])
                    ->get();
        }

        if (empty($khmai)) {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',['0'])
                    ->get();
        } else {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',$khmai)
                    ->get();
        }
        return view('backend.khuyenmai.sua',compact('khuyenmai','sanpham1','sanpham2'));
    }

    public function postEdit(Request $request,$id)
    {

    	$fImage = $request->fImage;
        $img_current = '/resources/upload/khuyenmai/'.$request->fImageCurrent;
        if (!empty($fImage )) {
             $filename=$fImage ->getClientOriginalName();
             DB::table('khuyenmai')->where('id',$id)
                            ->update([
                                'khuyenmai_tieu_de'   => $request->txtKMTittle,
                                'khuyenmai_noi_dung' => $request->txtKMContent,
                                'khuyenmai_url'   => Replace_TiengViet($request->txtKMTittle),
                                'khuyenmai_phan_tram'   => $request->txtKMPer,
                                'khuyenmai_thoi_gian' => $request->txtKMTime,
                                'khuyenmai_anh'=> $filename,
                                'khuyenmai_tinh_trang'=>1
                                ]);
             $fImage ->move(base_path() . '/resources/upload/khuyenmai/', $filename);
             File::delete($img_current);
        } else {
            DB::table('khuyenmai')->where('id',$id)
                            ->update([
                                'khuyenmai_tieu_de'   => $request->txtKMTittle,
                                'khuyenmai_noi_dung' => $request->txtKMContent,
                                'khuyenmai_url'   => Replace_TiengViet($request->txtKMTittle),
                                'khuyenmai_phan_tram'   => $request->txtKMPer,
                                'khuyenmai_thoi_gian' => $request->txtKMTime,
                                'khuyenmai_tinh_trang'=>1
                                ]);
        }
        
        $ids = DB::table('sanphamkhuyenmai')->select('sanpham_id')->where('khuyenmai_id',$id)->get();
        // print_r($ids);
        foreach ($ids as $val) {
            $p = DB::table('sanpham')
                ->where('id',$val->sanpham_id)
                ->update([
                        'sanpham_khuyenmai'=> 0
                    ]);
        }
        DB::table('sanphamkhuyenmai')->where('khuyenmai_id',$id)->delete();
        
        //Them $val moi
        $data = $request->input('products',[]);
        //print_r($data);
        
        foreach ($data as  $item) {
            $u = DB::table('sanpham')
                ->where('id',$item)
                ->update(['sanpham_khuyenmai' => 1]);
            $sanphamkhuyenmai = new Sanphamkhuyenmai;
            $sanphamkhuyenmai->sanpham_id = $item;
            $sanphamkhuyenmai->khuyenmai_id = $id;
            $sanphamkhuyenmai->save(); 
            
        }
        return redirect()->route('admin.khuyenmai.list')->with(['flash_level'=>'success','flash_message'=>'Edit thành công!!!']);
    }

    public function getAddPromotion()
    {
        $sanpham = DB::table('sanpham')->where('sanpham_da_xoa',1)->orderBy('id','DESC')->get();
        return view('backend.khuyenmai.themsanphamkm',compact('sanpham'));
    }

    public function postAddPromotion(Request $request)
    {
        $data = $request->input('products',[]);
        foreach ($data as  $item) {
            DB::table('sanpham')
                ->where('id',$item)
                ->update([
                        'sanpham_khuyenmai'=> 1,
                    ]);
            //print_r($item);
            $sanphamkhuyenmai = new Sanphamkhuyenmai;
            $sanphamkhuyenmai->sanpham_id = $item;
            $sanphamkhuyenmai->khuyenmai_id = $request->txtID;
            $sanphamkhuyenmai->save();
            
        }
        return redirect()->route('admin.khuyenmai.list')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }

    public function getEditPromotion($id)
    {
        //$tylegia = DB::table('sanphamkhuyenmai')->where('khuyenmai_id',$id)->get();
        $spkhuyenmai = DB::table('sanphamkhuyenmai')->select('sanpham_id')->where('khuyenmai_id',$id)->get();
        foreach ($spkhuyenmai as $key => $val) {
            $khmai[] = $val->sanpham_id;
        }
        if (!empty($khmai)) {
        
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',$khmai)
                    ->get();
        } else {
            $sanpham1 = DB::table('sanpham')
                    ->whereIn('id',['0'])
                    ->get();
        }

        if (empty($khmai)) {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',['0'])
                    ->get();
        } else {
            $sanpham2 = DB::table('sanpham')
                    ->whereNotIn('id',$khmai)
                    ->get();
        }
        return view('backend.khuyenmai.suasanphamkm',compact('sanpham1','sanpham2'));
    }


public function postEditPromotion(Request $request,$id)
    {
        $ids = DB::table('sanphamkhuyenmai')->select('sanpham_id')->where('khuyenmai_id',$id)->get();
        // print_r($ids);
        foreach ($ids as $val) {
            $p = DB::table('sanpham')
                ->where('id',$val->sanpham_id)
                ->update([
                        'sanpham_khuyenmai'=> 0
                    ]);
        }
        DB::table('sanphamkhuyenmai')->where('khuyenmai_id',$id)->delete();
        
        //Them $val moi
        $data = $request->input('products',[]);
        //print_r($data);
        
        foreach ($data as  $item) {
            $u = DB::table('sanpham')
                ->where('id',$item)
                ->update(['sanpham_khuyenmai' => 1]);
            $sanphamkhuyenmai = new Sanphamkhuyenmai;
            $sanphamkhuyenmai->sanpham_id = $item;
            $sanphamkhuyenmai->khuyenmai_id = $id;
            $sanphamkhuyenmai->save(); 
            
        }
        return redirect()->route('admin.khuyenmai.list')->with(['flash_level'=>'success','flash_message'=>'Edit thành công!!!']);
    }

}
