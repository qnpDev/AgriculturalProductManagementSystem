<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GiaohangRequest;
use App\Donhang;
use App\Lohang;
use DB;
use PDF;

class DonhangController extends Controller
{
    public function getList()
    {
    	$data = DB::table('donhang')->get();
    	return view('backend.donhang.danhsach',compact('data'));
    }

    public function getEdit($id)
    {
    	$data = DB::table('tinhtranghd')->get();
		foreach ($data as $key => $val) {
			$tinhtrang[] = ['id' => $val->id, 'name'=> $val->tinhtranghd_ten];
		}
    	$donhang = DB::table('donhang')->where('id',$id)->first();
    	$khachhang = DB::table('khachhang')->where('id',$donhang->khachhang_id)->first();
    	$chitiet = DB::table('chitietdonhang')->where('donhang_id',$donhang->id)->get();
    	return view('backend.donhang.sua',compact('donhang','tinhtrang','khachhang','chitiet'));
    }

    public function postEdit(Request $request,$id)
    {
    	$donhang = DB::table('donhang')->where('id',$id)->first();
    	$status1 = $donhang->tinhtranghd_id;
    	$status2 = $request->selStatus;
    	// $idSP = DB::table('chitietdonhang')->select('sanpham_id','chitietdonhang_so_luong')->where('donhang_id',$id)->get();
    	// // print_r($idSP);
    	// foreach ($idSP as $key => $val) {
    	// 	$idLHM = Db::table('lohang')->where('sanpham_id',$val->sanpham_id)->max('id');
    	// 	$lohang = DB::table('lohang')->where('id',$idLHM)->first();
    	// 	print_r($lohang);
    	// }

    	if ($status1 != $status2 && $status2 == 2) {
    		DB::table('donhang')->where('id',$id)
    			->update([
    					'tinhtranghd_id' => $status2,
    				]);
    		$idSP = DB::table('chitietdonhang')
    			->select('sanpham_id','chitietdonhang_so_luong')
    			->where('donhang_id',$id)->get();
	    	foreach ($idSP as $key => $val) {
	    		$idLHM = Db::table('lohang')->where('sanpham_id',$val->sanpham_id)->max('id');
	    		$lohang = DB::table('lohang')->where('id',$idLHM)->first();
	    		DB::table('lohang')
	    			->where('id',$idLHM)
	    			->update([
	    				'lohang_so_luong_da_ban' => $lohang->lohang_so_luong_da_ban + $val->chitietdonhang_so_luong,
	    				'lohang_so_luong_hien_tai' => $lohang->lohang_so_luong_hien_tai - $val->chitietdonhang_so_luong,
	    				]);
	    	}
    	}elseif ($status1 != $status2 && $status2 == 3) {
    		DB::table('donhang')->where('id',$id)
    			->update([
    					'tinhtranghd_id' => $status2,
    				]);
    		$idSP = DB::table('chitietdonhang')
    			->select('sanpham_id','chitietdonhang_so_luong')
    			->where('donhang_id',$id)->get();
	    	foreach ($idSP as $key => $val) {
	    		$idLHM = Db::table('lohang')->where('sanpham_id',$val->sanpham_id)->max('id');
	    		$lohang = DB::table('lohang')->where('id',$idLHM)->first();
	    		DB::table('lohang')
	    			->where('id',$idLHM)
	    			->update([
	    				'lohang_so_luong_doi_tra' => $lohang->lohang_so_luong_doi_tra + $val->chitietdonhang_so_luong,
	    				'lohang_so_luong_hien_tai' => $lohang->lohang_so_luong_hien_tai + $val->chitietdonhang_so_luong,
	    				'lohang_so_luong_da_ban' => $lohang->lohang_so_luong_da_ban - $val->chitietdonhang_so_luong,
	    				]);
	    	}
    	}elseif ($status1 != $status2 && $status2 == 4) {
    		DB::table('donhang')->where('id',$id)
    			->update([
    					'tinhtranghd_id' => $status2,
    				]);
    		$idSP = DB::table('chitietdonhang')
    			->select('sanpham_id','chitietdonhang_so_luong')
    			->where('donhang_id',$id)->get();
	    	foreach ($idSP as $key => $val) {
	    		$idLHM = Db::table('lohang')->where('sanpham_id',$val->sanpham_id)->max('id');
	    		$lohang = DB::table('lohang')->where('id',$idLHM)->first();
	    		DB::table('lohang')
	    			->where('id',$idLHM)
	    			->update([
	    				'lohang_so_luong_da_ban' => $lohang->lohang_so_luong_da_ban + $val->chitietdonhang_so_luong,
	    				'lohang_so_luong_hien_tai' => $lohang->lohang_so_luong_hien_tai - $val->chitietdonhang_so_luong,
	    				]);
	    	}
    	}
    	else {
    		DB::table('donhang')->where('id',$id)
    			->update([
    					'tinhtranghd_id' => $status2,
    				]);
    	}
    	
    	return redirect()->route('admin.donhang.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa thành công!!!']);
    	
    }
    public function getEdit1($id)
    {
    	$data = DB::table('tinhtranghd')->get();
		foreach ($data as $key => $val) {
			$tinhtrang[] = ['id' => $val->id, 'name'=> $val->tinhtranghd_ten];
		}
    	$donhang = DB::table('donhang')->where('id',$id)->first();
    	$khachhang = DB::table('khachhang')->where('id',$donhang->khachhang_id)->first();
    	$chitiet = DB::table('chitietdonhang')->where('donhang_id',$donhang->id)->get();
    	return view('backend.donhang.suagiaohang',compact('donhang','tinhtrang','khachhang','chitiet'));
    }

    public function postEdit1(GiaohangRequest $request,$id)
    {
    	DB::table('donhang')
    		->where('id',$id)
    		->update([
    			'donhang_nguoi_nhan'=> $request->txtName,
    			'donhang_nguoi_nhan_sdt'=> $request->txtPhone,
    			'donhang_nguoi_nhan_email'=> $request->txtEmail,
    			'donhang_nguoi_nhan_dia_chi'=> $request->txtAddress,
    			'donhang_ghi_chu'=> $request->txtNote,
    		]);
    	return redirect()->route('admin.donhang.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa thành công!!!']);
    }

    public function getEdit2($id)
    {
    	$data = DB::table('tinhtranghd')->get();
		foreach ($data as $key => $val) {
			$tinhtrang[] = ['id' => $val->id, 'name'=> $val->tinhtranghd_ten];
		}
    	$donhang = DB::table('donhang')->where('id',$id)->first();
    	$khachhang = DB::table('khachhang')->where('id',$donhang->khachhang_id)->first();
    	$chitiet = DB::table('chitietdonhang')->where('donhang_id',$donhang->id)->get();
    	return view('backend.donhang.suathanhtoan',compact('donhang','tinhtrang','khachhang','chitiet'));
    }
    public function postEdit2(Request $request,$id)
    {
    	// $idSP = DB::table('chitietdonhang')->select('sanpham_id')->where('donhang_id',$id)->get();
    	$sp= DB::select('select sanpham_id,chitietdonhang_so_luong,chitietdonhang_thanh_tien,(chitietdonhang_thanh_tien/chitietdonhang_so_luong) as gia from chitietdonhang where donhang_id = ?', [$id]);
    	// print_r(count($idSP));
    	$data = $request->input('products',[]);
    	// print_r($data);
    	for ($i=0; $i < count($sp); $i++) { 
    		$a = $sp[$i]->sanpham_id;
    		DB::table('chitietdonhang')
    			->where([['sanpham_id',$a],['donhang_id',$id] ])
    			->update([
    				'chitietdonhang_so_luong'=>$request->txtQuant[$i],
    				'chitietdonhang_thanh_tien'=>($request->txtQuant[$i]*$sp[$i]->gia),
    				]);
    	}

    	//Delete san pham khoi gio hang

    	foreach ($data as  $val) {
    		DB::table('chitietdonhang')
    			->where([['sanpham_id',$val],['donhang_id',$id] ])
    			->delete();
    	}

    	//Tinh lai tong gia tri don hang

    	$tong = DB::select('select sum(chitietdonhang_thanh_tien) as tong from chitietdonhang where donhang_id = ?', [$id]);
    	// print_r($tong[0]->tong);
    	$p = DB::table('donhang')
    		->where('id',$id)
    		->update([
    			'donhang_tong_tien' =>$tong[0]->tong,
    			]);

    	return redirect()->route('admin.donhang.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa thành công!!!']);
    }

    public function pdf($id)
    {
        $donhang = DB::table('donhang')->where('id',$id)->first();
        $chitietdonhang = DB::table('chitietdonhang')->where('donhang_id',$id)->get();
        $khachhang = DB::table('khachhang')->where('id',$donhang->khachhang_id)->first();
        // print_r($khachhang);
        $pdf = PDF::loadView('backend.donhang.hoadon',compact('donhang','chitietdonhang','khachhang'));
        return $pdf->stream();
    }
}
