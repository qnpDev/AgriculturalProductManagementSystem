@extends('backend.master')
@section('title')
<h3 class="page-header ">
    <a href="{!! URL::route('admin.thongke.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Kho hàng</i></a>
    /{{ $title}}
    </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    Danh sách sản phẩm
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Ký hiệu</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>ĐVT</th>
                <th>Lô hàng</th>
                <th>Giá mua vào</th>
                <th>Giá bán ra</th>
                <th>Nhập vào</th>
                <th>Đã bán</th>
                <th>Hiện tại</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="odd gradeX" align="left">
                <td>{!! $item->sanpham_ky_hieu !!}</td>
                <td>{!! $item->sanpham_ten !!}</td>
                <td>
                    <?php $loaisanpham = DB::table('loaisanpham')->where('id',$item->loaisanpham_id)->first(); ?>
                    @if (!empty($loaisanpham->loaisanpham_ten))
                        {!! $loaisanpham->loaisanpham_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>
                    <?php $donvitinh = DB::table('donvitinh')->where('id',$item->donvitinh_id)->first(); ?>
                    @if (!empty($donvitinh->donvitinh_ten))
                        {!! $donvitinh->donvitinh_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>{!! $item->lohang_ky_hieu !!}</td>
                <td>{!! $item->lohang_gia_mua_vao !!}</td>
                <td>{!! $item->lohang_gia_ban_ra !!}</td>
                <td>{!! $item->lohang_so_luong_nhap !!}</td>
                <td>{!! $item->lohang_so_luong_da_ban !!}</td>
                <td>{!! $item->lohang_so_luong_hien_tai !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>

@stop
