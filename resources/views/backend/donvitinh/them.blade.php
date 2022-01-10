@extends('backend.master')

@section('content')
<form action="{!! route('admin.donvitinh.getAdd') !!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="{!! URL::route('admin.donvitinh.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Đơn vị tính</i></a>
                /Thêm mới
              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{!! URL::route('admin.donvitinh.list') !!}" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
        <div class="col-lg-7">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtDVTName" value="{!! old('txtDVTName') !!}" placeholder="Tên..." />
                <div>
                    {!! $errors->first('txtDVTName') !!}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDVTIntro" placeholder="Mô tả..." >{!! old('txtDVTIntro') !!}</textarea>
                <script type="text/javascript">CKEDITOR.replace('txtDVTIntro'); </script>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </form>

@stop