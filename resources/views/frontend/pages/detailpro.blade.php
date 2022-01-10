@extends('frontend.master')
@section('content')

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! asset('resources/upload/sanpham/'.$sanpham->sanpham_anh) !!}" alt="fashion img" style="width: 1920px; height: 300px;">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{!! $sanpham->sanpham_ten !!}</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>
          <li><a href="{!! url('nhom-thuc-pham',$nhom->nhom_url) !!}">{!! $nhom->nhom_ten !!}</a></li>
          <li><a href="{!! url('loai-san-pham',$loaisanpham->loaisanpham_url) !!}">{!! $loaisanpham->loaisanpham_ten !!}</a></li>    
          <li class="active">{!! $sanpham->sanpham_ten !!}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <!-- product category -->
<section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-product-details-area">
        <div class="aa-product-details-content">
          <div class="row">
          <!-- Modal view slider -->
          <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="aa-product-view-slider">
            <a href="{!! asset('resources/upload/sanpham/'.$sanpham->sanpham_anh) !!}" class="MagicZoom" id="jeans" data-options="selectorTrigger: hover; transitionEffect: false;">
            <img src="{!! asset('resources/upload/sanpham/'.$sanpham->sanpham_anh) !!}" style="width: 250px; height: 300px;"></a> 
             @foreach ($hinhsanpham as $hinh)
                <a data-zoom-id="jeans" href="{!! asset('resources/upload/chitietsanpham/'.$hinh->hinhsanpham_ten) !!}" data-image="{!! asset('resources/upload/chitietsanpham/'.$hinh->hinhsanpham_ten) !!}">
                <img src="{!! asset('resources/upload/chitietsanpham/'.$hinh->hinhsanpham_ten) !!}" style="width: 45px; height: 55px;">
                </a>
              @endforeach                              
          </div>
          </div>
          <!-- Modal view content -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="aa-product-view-content">
            <h1>{!! $sanpham->sanpham_ten !!}</h1>
            <div class="aa-price-block">
              <h3>
              Giá: 
              <span class="aa-product-view-price">{!! number_format("$sanpham->lohang_gia_ban_ra",0,",",".") !!}vnđ</span>
              <p class="aa-product-avilability">Đơn vị tính: <span>{!! $sanpham->donvitinh_ten !!}</span></p>
              </h3>
            </div>
            
            <div class="aa-prod-quantity">
              <p class="aa-prod-category">
              Loại sản phẩm: <a href="{!! url('loai-san-pham',$loaisanpham->loaisanpham_url) !!}">{!! $sanpham->loaisanpham_ten !!}</a>
              </p>
            </div>
            <div class="aa-prod-view-bottom">
              <a class="aa-add-to-cart-btn" href="{!! url('mua-hang',[$sanpham->id,$sanpham->sanpham_url]) !!}"><span class="fa fa-shopping-cart">Mua hàng</a>
            </div>
            </div>
          </div>
          
        </div>
        <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Mô tả sản phẩm</a></li>
                <li><a href="#review" data-toggle="tab">Nhận xét</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{!! $sanpham->sanpham_mo_ta !!}</p>
                  
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4> Nhận xét</h4> 
                   <ul class="aa-review-nav">
                    @if ($binhluan != null)
                      @foreach ($binhluan as $item)
                        <li>
                          <div class="media">
                            <div class="media-left">
                              <a href="#">
                                <img src="{!! url('public/images/avatar.jpg') !!}" alt="fashion img" style="width: 50px; height: 50px;" >
                              </a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading"><strong>{!! $item->binhluan_ten !!}</strong> - <span>{!! date("d-m-Y",strtotime($item->created_at)) !!}</span></h4>
                              ************************************
                              <p>{!! $item->binhluan_noi_dung !!}</p>
                            </div>
                          </div>
                        </li>
                      @endforeach
                    @endif
                   </ul>


                   <h4>Thêm bình luận</h4>

                   <!-- review form -->
                   <form action="{!! url('binh-luan') !!}"  class="aa-review-form" method="POST">
                   <p class="comment-notes">
                        Địa chỉ mail của các bạn sẽ không hiện lên và nội dung bình luận sẽ được kiểm tra trước khi phát hành <span class="required">*</span>
                      </p>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <input type="hidden" name="txtID" value="{!! $sanpham->id !!}" />
                      <div class="form-group">
                        <label for="message">Nội dung<span class="required">*</span></label>
                        <textarea class="form-control" name="txtContent" rows="3" id="message" required="required"></textarea>
                        <div>
                            {!! $errors->first('txtContent') !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name">Tên<span class="required">*</span></label>
                        <input type="text" class="form-control" name="txtName"  id="name" required="required" placeholder="Name" />
                        <div>
                            {!! $errors->first('txtName') !!}
                        </div>
                      </div>  
                      <div class="form-group">
                        <label for="email">Email<span class="required">*</span></label>
                        <input type="email" class="form-control"  name="txtEmail" id="email" placeholder="example@gmail.com" required="required" />
                        <div>
                            {!! $errors->first('txtEmail') !!}
                        </div>
                      </div>
                      <button type="submit" class="btn btn-default aa-review-submit">Gửi</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <!-- <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                                                                                  
              </ul>
            </div> -->
          </div>
         </div>   
    </div>
        </div>
        </div>
  </section>
  <!-- / product category -->
  <!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop