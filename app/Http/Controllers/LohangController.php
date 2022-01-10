<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Requests\LohangAddRequest;
use App\Http\Requests\LohangEditRequest;
use App\Lohang;
use App\Sanpham;
use App\Nhacungcap;
use DB;
use Input,File;

class LohangController extends Controller
{
    public function getList()
    {
    	$data = DB::table('lohang')->orderBy('id','DESC')->get();
    	return view('backend.lohang.danhsach',compact('data'));
    }

    public function getAdd()
    {
        $products = DB::table('sanpham')->get();
        foreach ($products as $key => $val) {
            $product[] = ['id' => $val->id, 'name'=> $val->sanpham_ten];
        }
        $vendors = DB::table('nhacungcap')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name'=> $val->nhacungcap_ten];
        }
    	return view('backend.lohang.them',compact('product','vendor'));
    }

    public function postAdd(LohangAddRequest $request)
    {
    	$lohang = new Lohang;
        $lohang->lohang_ky_hieu = $request->txtLHSignt;
        $lohang->lohang_han_su_dung = $request->txtLHShelf;
        $lohang->lohang_gia_mua_vao = $request->txtLHBuyPrice;
        $lohang->lohang_gia_ban_ra = $request->txtLHSalePrice;
        $lohang->lohang_so_luong_nhap = $request->txtLHQuant;
        $lohang->lohang_so_luong_da_ban = 0;
        $lohang->lohang_so_luong_doi_tra = 0;
        $lohang->lohang_so_luong_hien_tai = $request->txtLHQuant;
        $lohang->sanpham_id = $request->txtLHProduct;
        $lohang->nhacungcap_id = $request->txtLHVendor;
        $lohang->save();
        return redirect()->route('admin.lohang.list')->with(['flash_level'=>'success','flash_message'=>'Thêm lô hàng thành công!!!']);
    }

    public function getEdit($id)
    {
        $products = DB::table('sanpham')->get();
        foreach ($products as $key => $val) {
            $product[] = ['id' => $val->id, 'name'=> $val->sanpham_ten];
        }
        $vendors = DB::table('nhacungcap')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name'=> $val->nhacungcap_ten];
        }
        $lohang = DB::table('lohang')->where('id',$id)->first();
        //print_r($lohang);
    	return view('backend.lohang.sua',compact('product','vendor','lohang','id'));
    }

    public function postEdit(LohangEditRequest $request, $id)
    {
        $lohang = DB::table('lohang')->where('id',$id)->first();
    	DB::table('lohang')->where('id',$id)
                           ->update([
                'lohang_ky_hieu' => $request->txtLHSignt,
                'lohang_han_su_dung' => $request->txtLHShelf,
                'lohang_gia_mua_vao' => $request->txtLHBuyPrice,
                'lohang_gia_ban_ra' => $request->txtLHSalePrice,
                'lohang_so_luong_nhap' => $request->txtLHQuant,
                'lohang_so_luong_hien_tai' => ($request->txtLHQuant - $lohang->lohang_so_luong_da_ban + $lohang->lohang_so_luong_doi_tra),
                'sanpham_id' => $request->txtLHProduct,
                'nhacungcap_id' => $request->txtLHVendor                
            ]);
    	return redirect()->route('admin.lohang.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật lô hàng thành công!!!']);
    }

    public function getDelete($id)
    {
    	DB::table('lohang')->where('id',$id)->delete();
        return redirect()->route('admin.lohang.list')->with(['flash_level'=>'success','flash_message'=>'Xóa đơn vị tính thành công!!!']);
    }

    public function getNhaphang($id)
    {
        $sanpham = DB::table('sanpham')->where('id',$id)->first();
        $vendors = DB::table('nhacungcap')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name'=> $val->nhacungcap_ten];
        }
        return view('backend.lohang.nhaphang',compact('sanpham','vendor'));
    }

    public function postNhaphang(LohangAddRequest $request,$id)
    {
        $lohang = new Lohang;
        $lohang->lohang_ky_hieu = $request->txtLHSignt;
        $lohang->lohang_han_su_dung = $request->txtLHShelf;
        $lohang->lohang_gia_mua_vao = $request->txtLHBuyPrice;
        $lohang->lohang_gia_ban_ra = $request->txtLHSalePrice;
        $lohang->lohang_so_luong_nhap = $request->txtLHQuant;
        $lohang->lohang_so_luong_da_ban = 0;
        $lohang->lohang_so_luong_doi_tra = 0;
        $lohang->lohang_so_luong_hien_tai = $request->txtLHQuant;
        $lohang->sanpham_id = $id;
        $lohang->nhacungcap_id = $request->txtLHVendor;
        $lohang->save();
        return redirect()->route('admin.lohang.list')->with(['flash_level'=>'success','flash_message'=>'Thêm lô hàng thành công!!!']);
    }
}
 