@extends('backend.master')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="{!! URL::route('admin.quangcao.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Quảng cáo</i></a>
                /Thêm mới
              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{!! URL::route('admin.quangcao.list') !!}" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
        <div class="col-lg-7">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input" >Trạng thái</label>
                
                <div class="input-group">
                    <div class="radio">
                        @if ($quangcao->quangcao_trang_thai == 1)
                            <label>
                                <input type="radio" name="txtNName" id="input" value="1" checked="checked">
                                Hiện
                                <br>
                                <input type="radio" name="txtNName" id="input" value="0" >
                                Ẩn
                            </label>
                        @else
                            <label>
                                <input type="radio" name="txtNName" id="input" value="1" >
                                Hiện
                                <br>
                                <input type="radio" name="txtNName" id="input" value="0" checked="checked">
                                Ẩn
                            </label>
                        @endif
                        
                    </div>
                </div>
                <div>
                    {!! $errors->first('txtNName') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Ảnh</label>
                <br>
                <img src="{!! asset('resources/upload/quangcao/'.$quangcao->quangcao_anh) !!}" class="img-responsive img-rounded" alt="Image" style="width: 150px; height: 200px;">
                <br>
                <input type="file" name="fImage">
                <div>
                    {!! $errors->first('fImage') !!}
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>
@stop