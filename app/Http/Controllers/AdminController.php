<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Chartjs;

class AdminController extends Controller
{
    public function index()
    {
    	$donhang = DB::table('donhang')->where('tinhtranghd_id',1)->count();
    	$luotbinhluan = DB::table('binhluan')->where('binhluan_trang_thai',0)->count();
    	$khachhang = DB::table('khachhang')->count();
    	$sanpham = DB::table('sanpham')->count();
    	$binhluan = DB::table('binhluan')->where('binhluan_trang_thai',0)->get();
    	$bannhieu = DB::table('chitietdonhang')
                ->where('donhang.tinhtranghd_id',4)
                ->join('donhang','donhang.id','=','chitietdonhang.donhang_id')
                ->select(
                    'sanpham_id',
                    DB::raw('SUM(chitietdonhang_so_luong) as ban'),
                    DB::raw('SUM(chitietdonhang_thanh_tien) as tien')
                    )
                ->groupBy('sanpham_id')
                ->orderBy('tien', 'desc')
                ->take(10)
                ->get();
                // print_r($bannhieu);
        $nhapnhieu = DB::table('lohang')

                ->select(
                    'sanpham_id',
                    DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                    DB::raw('SUM(lohang_gia_mua_vao*lohang_so_luong_nhap) as tien')
                    )
                ->groupBy('sanpham_id')
                ->orderBy('tien', 'desc')
                ->take(10)
                ->get();
        $muanhieu = DB::table('donhang')
                ->where('donhang.tinhtranghd_id',4)
                ->select(
                    'khachhang_id',
                    DB::raw('COUNT(khachhang_id) as donhang'),
                    DB::raw('SUM(donhang_tong_tien) as tien')
                    )
                ->groupBy('khachhang_id')
                ->orderBy('tien', 'desc')
                ->take(10)
                ->get(); 
        // print_r($nhapnhieu);
    	return view('backend.dashboard',compact('donhang','binhluan','khachhang','sanpham','luotbinhluan','bannhieu','nhapnhieu','muanhieu'));
    }
}
