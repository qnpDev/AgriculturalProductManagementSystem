@extends('backend.master')
@section('title')
    <h3 class="page-header ">
        Quảng cáo /
        <a href="{!! URL::route('admin.quangcao.getAdd') !!}" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách ảnh</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr  align="center">
                
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Ảnh</th>
                <th class="col-lg-5">Tên</th>
                <th class="col-lg-2">Trạng thái</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($data as $item)
            <tr class="odd gradeX">
                
                <td>{!! $item->id !!}</td>
                <td>
                <img src="{!! asset('resources/upload/quangcao/'.$item->quangcao_anh) !!}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
                </td>
                <td>{!! $item->quangcao_anh !!}</td>
                <td align="center">
                    
                    @if ($item->quangcao_trang_thai == 1)
                    <a href="{!! URL::route('admin.quangcao.getChance', [$item->id,0] ) !!}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Cập nhật trạng thái"><i class="fa fa-retweet"></i>Ẩn ảnh</a>
                    <input type="hidden" name="txtChance" value="0" />
                    @else
                    <a href="{!! URL::route('admin.quangcao.getChance', [$item->id,1] ) !!}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Cập nhật trạng thái"><i class="fa fa-retweet"></i>Hiện ảnh</a>
                    <input type="hidden" name="txtChance" value="1" />
                    @endif
                    
                </td>
                <td class="center" align="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{!! URL::route('admin.quangcao.getDelete', $item->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                <td class="center"  align="center"><a href="{!! URL::route('admin.quangcao.getEdit', $item->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
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
