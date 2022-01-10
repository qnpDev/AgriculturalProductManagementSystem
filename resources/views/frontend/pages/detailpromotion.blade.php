@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! url('public/images/promotionpanel.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Khuyến mãi</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">Khuyến mãi</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
    <!-- Start Promo section -->
  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">
                    <figure class="aa-blog-img">
                      <a href="#"><img src="{!! asset('resources/upload/khuyenmai/'.$khuyenmai->khuyenmai_anh) !!}"  style="width: 500px; height: 450px;"> </a>
                    </figure>                        
                    <h2><a href="#">{!! $khuyenmai->khuyenmai_tieu_de !!}</a></h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-date">
                        {!! $khuyenmai->created_at !!}
                      </div>
                    </div>
                    
                    <p>{!! $khuyenmai->khuyenmai_noi_dung !!}</p>

                  </article>
                  <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Sản phẩm khuyến mãi</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach ($spham as $item)
                <?php $sanpham = DB::table('sanpham')->where('id',$item->sanpham_id)->first(); ?>
                  <li>
                  <figure>
                    <a class="aa-product-img" href="{!! url('san-pham',$sanpham->id,$sanpham->sanpham_url) !!}"><img src="{!! asset('resources/upload/sanpham/'.$sanpham->sanpham_anh) !!}" style="width: 250px; height: 300px;" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="{!! url('mua-hang',[$item->id,$item->sanpham_url]) !!}"><span class="fa fa-shopping-cart"><span class="fa fa-shopping-cart"></span>Mua ngay</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="{!! url('san-pham',$sanpham->id,$sanpham->sanpham_url) !!}">{!! $sanpham->sanpham_ten !!}</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
                                                                                                
              </ul>
            </div>  
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
  </section>
  <!-- / Blog Archive -->
  <!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop