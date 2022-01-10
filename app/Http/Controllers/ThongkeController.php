<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ThongkeController extends Controller
{
    public function getList()
    {
    	$sl = DB::table('lohang')
	    	->select(DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
	    			 DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	    			 DB::raw('SUM(lohang_so_luong_hien_tai) as ton'),
	    			 DB::raw('SUM(lohang_so_luong_doi_tra) as tra'))
	    	->get();
	    $bannhieu = DB::table('lohang')
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->orderBy('ban', 'desc')
	   			->get();
	   	$tonnhieu = DB::table('lohang')
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->orderBy('ton', 'desc')
	   			->get();
	   	$hethan = DB::table('lohang')
	   			->where('lohang_tinh_trang',1)
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->get();
	   	$conhan = DB::table('lohang')
	   			->where('lohang_tinh_trang',0)
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->get();		
	   	// print_r($hethan);
    	return view('backend.thongke.tongquan',compact('sl','tonnhieu','bannhieu','hethan','conhan'));
    }

    public function getNhapvao()
    {
    	$title = 'Sản phẩm nhập vào';
    	$data = DB::table('lohang')
    		->join('sanpham','sanpham.id','=','lohang.sanpham_id')
	    	->select(
	    		'sanpham.*',
	    		'lohang.*'
	    			 )
	    	->get();
	    // print_r($sanpham);
	    return view('backend.thongke.sanpham',compact('data','title'));
    }

    public function getBanra()
    {
    	$title = 'Sản phẩm bán ra';
    	$data = DB::table('lohang')
    		->where('lohang.lohang_so_luong_da_ban','>',0)
    		->join('sanpham','sanpham.id','=','lohang.sanpham_id')
	    	->select(
	    		'sanpham.*',
	    		'lohang.*'
	    			 )
	    	->get();
	    // print_r($data);
	    return view('backend.thongke.sanpham',compact('data','title'));
    }

    public function getHienco()
    {
    	$title = 'Sản phẩm hiện có';
    	$data = DB::table('lohang')
    		->where('lohang.lohang_so_luong_hien_tai','>',0)
    		->join('sanpham','sanpham.id','=','lohang.sanpham_id')
	    	->select(
	    		'sanpham.*',
	    		'lohang.*'
	    			 )
	    	->get();
	    // print_r($data);
	    return view('backend.thongke.sanpham',compact('data','title'));
    }

    public function getDoitra()
    {
    	$title = 'Sản phẩm đổi trả';
    	$data = DB::table('lohang')
    		->where('lohang.lohang_so_luong_doi_tra','>',0)
    		->join('sanpham','sanpham.id','=','lohang.sanpham_id')
	    	->select(
	    		'sanpham.*',
	    		'lohang.*'
	    			 )
	    	->get();
	    // print_r($data);
	    return view('backend.thongke.sanpham',compact('data','title'));
    }

    public function getBanchay()
    {
    	$title = 'Sản phẩm bán chạy';
	    $data = DB::table('lohang')
	   			->select(
	   				'sanpham_id','lohang_gia_ban_ra','lohang_gia_mua_vao','lohang_ky_hieu',
	   				DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->orderBy('ban', 'desc')
	   			->get();
	    // print_r($data);
	    return view('backend.thongke.sanpham1',compact('data','title'));
    }

    public function getTonnhieu()
    {
    	$title = 'Sản phẩm nhập vào';
    	$data = DB::table('lohang')
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->orderBy('ton', 'desc')
	   			->get();
	    // print_r($sanpham);
	    return view('backend.thongke.sanpham1',compact('data','title'));
    }

    public function getHethan()
    {
    	$title = 'Sản phẩm hết hạn sử dụng';
    	$data = DB::table('lohang')
	   			->where('lohang_tinh_trang',1)
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->get();
	    // print_r($sanpham);
	    return view('backend.thongke.sanpham1',compact('data','title'));
    }

    public function getConhan()
    {
    	$title = 'Sản phẩm còn hạn sử dụng';
    	$data = DB::table('lohang')
	   			->where('lohang_tinh_trang',0)
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
	   				DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
	   				DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->get();
	    // print_r($sanpham);
	    return view('backend.thongke.sanpham1',compact('data','title'));
    }
}
