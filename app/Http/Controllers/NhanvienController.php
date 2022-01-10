<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NhanvienAddRequest;
use App\Nhanvien;
use App\User;
use DB;
use Hash;

class NhanvienController extends Controller
{
    public function getList()
    {
        $data = DB::table('nhanvien')
            ->join('users', 'users.id', '=', 'nhanvien.user_id')
            ->select('users.*', 'nhanvien.*')
            ->get();
            // print_r($data);
    	return view('backend.nhanvien.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	$data = DB::table('loainguoidung')->get();
        foreach ($data as $key => $val) {
            $loainguoidung[] = ['id' => $val->id, 'name'=> $val->loainguoidung_ten];
        }
        return view('backend.nhanvien.them',compact('loainguoidung'));
    }

    public function postAdd(NhanvienAddRequest $request)
    {
        $user = new User;
        $user->name = $request->txtUsername;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass);
        $user->loainguoidung_id = $request->txtRole;
        $user->remember_token = $request->_token;
        $user->save();

        $id = DB::table('users')->select('id')->where('email',$request->txtEmail)->first();
        $userid = $id->id;

    	$nhanvien = new Nhanvien;
        $nhanvien->nhanvien_ten = $request->txtNVName;
        $nhanvien->nhanvien_cmnd = $request->txtNVID;
        $nhanvien->nhanvien_sdt = $request->txtNVPhone;
        $nhanvien->nhanvien_ngay_vao_lam = $request->txtNVDate;
        $nhanvien->nhanvien_dia_chi = $request->txtNVAddress;
        $nhanvien->user_id = $userid;
        $nhanvien->save();
        return redirect()->route('admin.nhanvien.list')->with(['flash_level'=>'success','flash_message'=>'Thêm nhanvien thành công!!!']);
    }

    public function getDelete()
    {
    	# code...
    }

    public function getEdit()
    {
    	# code...
    }

    public function postEdit()
    {
    	# code...
    }
}
