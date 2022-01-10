@extends('backend.master')

@section('content')

    <form action="{!! route('admin.nhacungcap.getAdd') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="{!! URL::route('admin.nhacungcap.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Nhà cung cấp</i></a>
                /Thêm mới
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
            <input class="form-control" name="txtNCCName" value="{!! old('txtNCCName') !!}" placeholder="Nhập tên nhà cung cấp..." />
            <div>
                {!! $errors->first('txtNCCName') !!}
            </div>
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" name="txtNCCPhone" value="{!! old('txtNCCPhone') !!}" placeholder="Số điện thoại..." />
            <div>
                {!! $errors->first('txtNCCPhone') !!}
            </div>
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <textarea class="form-control" rows="2" name="txtNCCAdress" placeholder="Địa chỉ...">{!! old('txtNCCAdress') !!}</textarea>
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