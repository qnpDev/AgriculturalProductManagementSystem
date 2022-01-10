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
                <th>Nhập vào</th>
                <th>Đã bán</th>
                <th>Hiện tại</th>
                <th>Nhập hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="odd gradeX" align="left">
            <?php  
                $sanpham = DB::table('sanpham')->where('id',$item->sanpham_id)->first();
            ?>
                <td>{!! $sanpham->sanpham_ky_hieu !!}</td>
                <td>{!! $sanpham->sanpham_ten !!}</td>
                <td>
                    <?php $loaisanpham = DB::table('loaisanpham')->where('id',$sanpham->loaisanpham_id)->first(); ?>
                    @if (!empty($loaisanpham->loaisanpham_ten))
                        {!! $loaisanpham->loaisanpham_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>
                    <?php $donvitinh = DB::table('donvitinh')->where('id',$sanpham->donvitinh_id)->first(); ?>
                    @if (!empty($donvitinh->donvitinh_ten))
                        {!! $donvitinh->donvitinh_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>{!! $item->nhap !!}</td>
                <td>{!! $item->ban !!}</td>
                <td>{!! $item->ton !!}</td>
                <td class="center">
                <a href="{!! URL::route('admin.lohang.getNhaphang', [$item->sanpham_id] ) !!}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
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
