@extends('backend.master')
@section('title')
    <h1 class="page-header">Tuyển dụng</h1>
@stop
@section('content')                 
<div class="panel-body">

    <table class="table table-striped table-bordered table-hover" >
        <thead>
            <tr class="odd gradeX" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-1">Tittle</th>
                <th class="col-lg-4">Mô tả</th>
                <th class="col-lg-2">Ngày HH</th>
                <th class="col-lg-2">Liên hệ</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($data as $item)
            <tr class="odd gradeX" align="center">
                <td class="col-lg-1">{!! $item->id !!}</td>
                <td class="col-lg-1">{!! $item->tuyendung_tieu_de !!}</td>
                <td class="col-lg-4">{!! $item->tuyendung_mo_ta !!}</td>
                <td class="col-lg-2">{!! date("d - m - Y",strtotime("$item->created_at + $item->tuyendung_thoi_gian days"))  !!}</td>
                <td class="col-lg-2">{!! $item->tuyendung_lien_he !!}</td>
                <td class="center" class="col-lg-1"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{!! URL::route('admin.tuyendung.getDelete', $item->id ) !!}">Xóa</a></td>
                <td class="center" class="col-lg-1"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.tuyendung.getEdit', $item->id ) !!}">Sửa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
@stop
