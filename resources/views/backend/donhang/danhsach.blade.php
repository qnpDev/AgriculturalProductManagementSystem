@extends('backend.master')
@section('title')
    <h3 class="page-header">
        Đơn hàng
    </h3>
@stop
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách đơn hàng</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="even gradeC" align="center">
                    <td>{!! $item->id !!}</td>
                    <td>
                    <?php  
                        $kh = DB::table('khachhang')->where('id',$item->khachhang_id)->first();
                        print_r($kh->khachhang_ten);
                    ?> 
                    </td>
                    <td>{!! date("H:m:s d-m-Y", strtotime("$item->created_at")) !!}</td>
                    <td>{!! number_format("$item->donhang_tong_tien",0,",",".") !!} vnđ </td>
                    <td>
                    <?php  
                        $tt = DB::table('tinhtranghd')->where('id',$item->tinhtranghd_id)->first();
                        print_r($tt->tinhtranghd_ten);
                    ?>  
                    </td>
                   
                    <td class="center">
                    <a href="{!! URL::route('admin.donhang.getEdit1', $item->id ) !!}" 
                       type="button" class="btn btn-primary" 
                       data-toggle="tooltip" data-placement="left" 
                       title="Cập nhât Thông tin Giao hàng">
                        <i class="fa fa-crosshairs"></i>
                    </a>
                    <a href="{!! URL::route('admin.donhang.getEdit2', $item->id ) !!}" 
                       type="button" class="btn btn-danger" 
                       data-toggle="tooltip" data-placement="left" 
                       title="Cập nhât Thông tin Thanh toán">
                        <i class="fa fa-credit-card"></i>
                    </a>
                    <a href="{!! URL::route('admin.donhang.getEdit', $item->id ) !!}" 
                       type="button" class="btn btn-warning" 
                       data-toggle="tooltip" data-placement="left" 
                       title="Cập nhât Tình trạng đơn hàng">
                        <i class="fa fa-exchange"></i>
                    </a>
                    <a href="{!! URL::route('admin.donhang.pdf', $item->id ) !!}" 
                       type="button" class="btn btn-default" 
                       data-toggle="tooltip" data-placement="left" 
                       title="In hóa đơn">
                        <i class="fa fa-print"></i>
                    </a>
                </td>
            </tr>
                </tr>
            @endforeach
            
        </tbody>
        </table>
</div>
    <!-- /.row -->
</div>
</div>
@stop
