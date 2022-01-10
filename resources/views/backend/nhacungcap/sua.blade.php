@extends('backend.master')

@section('content')

    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="{!! URL::route('admin.nhacungcap.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Nhà cung cấp</i></a>
                /Cập nhật
              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{!! URL::route('admin.nhacungcap.list') !!}" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
        <div class="col-lg-7">
        <div class="form-group">
            <label>Tên</label>
            <input class="form-control" name="txtNCCName" placeholder="Nhập tên nhà cung cấp..." value="{!! $data->nhacungcap_ten !!}" />
            <div>
                {!! $errors->first('txtNCCName') !!}
            </div>
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" name="txtNCCPhone" placeholder="Số điện thoại..." value="{!! $data->nhacungcap_sdt !!}" />
            <div>
                {!! $errors->first('txtNCCPhone') !!}
            </div>
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <textarea class="form-control" rows="2" name="txtNCCAdress" placeholder="Địa chỉ...">{!! $data->nhacungcap_dia_chi !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace('txtNCCAdress'); </script>
            <div>
                {!! $errors->first('txtNCCAdress') !!}
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    <form>

@stop