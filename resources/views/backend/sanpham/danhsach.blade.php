@extends('backend.master')
@section('title')
        <h3 class="page-header ">
        Sản phẩm / 
            <a href="{!! URL::route('admin.sanpham.getAdd') !!}"  style="margin-top:-8px;" class="btn btn-info">Thêm mới</a>
        </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách sản phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Ký hiệu</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>ĐVT</th>
                <th>Xóa</th>
                <th>Sửa</th>
                <th>Nhập hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="odd gradeX" align="left">

                <td>
                <img src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
                </td>
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
                <td class="center">
                <a href="{!! URL::route('admin.sanpham.getDelete', $item->id ) !!}" onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                </td>
                <td class="center" > <a href="{!! URL::route('admin.sanpham.getEdit', $item->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a></td>
                <td class="center">
                <a href="{!! URL::route('admin.lohang.getNhaphang', [$item->id] ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- /.row -->
</div>
</div>

@stop



