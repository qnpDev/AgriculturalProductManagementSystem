@extends('backend.master')
@section('title')
    <h1 class="page-header">Nhân viên</h1>
@stop
@section('content')                 
<div class="panel-body">
    <a href="{!! URL::route('admin.nhanvien.getAdd') !!}" class="btn btn-default">Thêm mới</a>
    <form class="navbar-form pull-right">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Tìm kiếm...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </form>
    

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>CMND</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Ngày vào làm</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Loại người dùng</th>
                
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr class="odd gradeX" align="center">
                <td>{!! $item->id !!}</td>
                <td>{!! $item->nhanvien_ten !!}</td>
                <td>{!! $item->nhanvien_cmnd !!}</td>
                <td>{!! $item->nhanvien_sdt !!}</td>
                <td>{!! $item->nhanvien_dia_chi !!}</td>
                <td>{!! $item->nhanvien_ngay_vao_lam !!}</td>
                <td>{!! $item->email !!}</td>
                <td>{!! $item->name !!}</td>
                <td>
                    <?php $loainguoidung = DB::table('loainguoidung')->where('id',$item->loainguoidung_id)->first(); ?>
                    @if (!empty($loainguoidung->loainguoidung_ten))
                        {!! $loainguoidung->loainguoidung_ten !!}
                    @else
                        {!! NULL!!}
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
            </tr>
        @endforeach
    </table>
</div>
    <!-- /.row -->
@stop