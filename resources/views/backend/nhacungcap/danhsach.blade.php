@extends('backend.master')
@section('title')
    <h3 class="page-header">
        Nhà cung cấp / 
        <a href="{!! URL::route('admin.nhacungcap.getAdd') !!}" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách nhà cung cấp</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Nhà cung cấp</th>
                <th class="col-lg-5">Địa chỉ</th>
                <th class="col-lg-2">Số điện thoại</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($data as $item)
           <tr class="odd gradeX">
                <td>{!! $item->id !!}</td>
                <td>{!! $item->nhacungcap_ten !!}</td>
                <td>{!! $item->nhacungcap_dia_chi !!}</td>
                <td>{!! $item->nhacungcap_sdt !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{!! URL::route('admin.nhacungcap.getDelete', $item->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                <td class="center"><a href="{!! URL::route('admin.nhacungcap.getEdit', $item->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
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