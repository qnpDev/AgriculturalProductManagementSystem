@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! url('public/images/careerpanel.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Tìm kiếm </h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>
          <li class="active">Tìm kiếm</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sắp xếp</label>
                  <select name="">
                    <option value="1" selected="Default">Mặc định</option>
                    <option value="2">Tên</option>
                    <option value="3">Giá</option>
                    <option value="4">Ngày</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Hiện thị</label>
                  <select name="">
                    <option value="1" selected="12">10</option>
                    <option value="2">20</option>
                    <option value="3">30</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              @if (!is_null($sanpham))
                <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach ($sanpham as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{!! url('san-pham',$item->sanpham_url) !!}"><img src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}"  style="width: 250px; height: 300px;"></a>
                    <a class="aa-add-card-btn" href="{!! url('mua-hang',[$item->id,$item->sanpham_url]) !!}"><span class="fa fa-shopping-cart"></span>Mua ngay</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{!! url('san-pham',$item->sanpham_url) !!}">{!! $item->sanpham_ten !!}</a></h4>
                      <span class="aa-product-price">{!! number_format("$item->lohang_gia_ban_ra",0,",",".") !!}vnđ</span>
                    </figcaption>
                  </figure>                         
                  @if ($item->sanpham_khuyenmai == 1)
                      <div class="aa-product-hvr-content">                           
                    </div>
                    <span class="aa-badge aa-sold-out" >Khuyến mãi!</span>                
                  @endif
                </li> 
                @endforeach                                      
              </ul>
              @else
              <div>
                <p><i>Rất tiếc! Chúng tôi không tìm thấy sản phẩm bạn đang cần.</i></p>
              </div>
                
                
              @endif
              

            </div>
            <!-- pagination -->
            @include('frontend.blocks.pagination')
            <!-- /pagination -->
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
             <!-- sidebar  1 -->
            
            @include('frontend.blocks.spbanchay')
             <!-- sidebar 2 -->
            @include('frontend.blocks.news')
          
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  <!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop