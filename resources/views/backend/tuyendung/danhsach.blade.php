@extends('backend.master')
@section('title')
        <h3 class="page-header ">
        Tuyển dụng /
        <a href="{!! URL::route('admin.tuyendung.getAdd') !!}" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
        </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách thông tin</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="odd gradeX" align="center">
                <th class="col-lg-1">Ảnh</th>
                <th class="col-lg-1">ID</th>
                <th class="col-lg-1">Tiêu đề</th>
                <th class="col-lg-3">Mô tả</th>
                <th class="col-lg-2">Ngày HH</th>
                <th class="col-lg-2">Liên hệ</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($data as $item)
            <tr class="odd gradeX">
            <td>
                <img src="{!! asset('resources/upload/tuyendung/'.$item->tuyendung_anh) !!}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
                </td>
                <td class="col-lg-1">{!! $item->id !!}</td>
                <td class="col-lg-1">{!! $item->tuyendung_tieu_de !!}</td>
                <td class="col-lg-3">{!! $item->tuyendung_mo_ta !!}</td>
                <td class="col-lg-2">{!! date("d - m - Y",strtotime("$item->created_at + $item->tuyendung_thoi_gian days"))  !!}</td>
                <td class="col-lg-2">{!! $item->tuyendung_lien_he !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{!! URL::route('admin.tuyendung.getDelete', $item->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                <td class="center"><a href="{!! URL::route('admin.tuyendung.getEdit', $item->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
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