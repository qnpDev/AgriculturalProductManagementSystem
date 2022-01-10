@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
  @if (!is_null($khuyenmai))
   <img src="{!! asset('resources/upload/khuyenmai/'.$khuyenmai->khuyenmai_anh) !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   @else
   <img src="{!! url('public/images/promotionpanel.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   @endif
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
      @if (!is_null($khuyenmai))
      <h2 style="font:30px tahoma, sans-serif;">{!! $khuyenmai->khuyenmai_tieu_de !!}</h2>
      @else
      <h2 style="font:30px tahoma, sans-serif;">Khuyến mãi</h2>
      @endif
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">Khuyến mãi</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
    <!-- Start Promo section -->
  <!-- / Promo section -->
    <!-- / product category -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-12">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details"  style="font:10px arial, sans-serif;">
                @if (!is_null($khuyenmai))
                  <article class="aa-blog-content-single" >                     
                     <div class="aa-article-bottom">
                  </div>
                  <?php 
                    $ngaybd =  date("Y-m-d", strtotime("$khuyenmai->created_at")); // Năm/Tháng/Ngày
                    $ngaykt = date("Y-m-d",strtotime($ngaybd . "+ $khuyenmai->khuyenmai_thoi_gian  day"));
                  ?>

                    <p>
                    Thời gian khuyến mãi:
                    <button type="button" class="btn btn-danger">{{date('d-m-Y',strtotime($ngaybd))}}</button>
                    đến
                    <button type="button" class="btn btn-danger">{{date('d-m-Y',strtotime($ngaykt))}}</button>
                    </p>
                    <p>{!! $khuyenmai->khuyenmai_noi_dung !!}</p>
                    <div class="blog-single-bottom">
                      <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          
                        </div>
                      </div>
                    </div>
                   
                  </article>
                  <!-- blog navigation -->
                  <div class="aa-product-related-item">
            
         
                      <h3 style="font:20px arial, sans-serif; color:red;"><b>Sản phẩm khuyến mãi</b></h3>
                
                    <ul class="aa-product-catg aa-related-item-slider">
                      <!-- start single product item -->
             @foreach ($spham as $item)
                      <?php 
                     $sanpham = DB::table('sanpham')
                      ->where('sanpham.id',$item->sanpham_id)
                      ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
                      ->join('donvitinh','sanpham.donvitinh_id', '=', 'donvitinh.id' )
                      ->join('loaisanpham','sanpham.loaisanpham_id' , '=', 'loaisanpham.id')
                      ->select(DB::raw('max(lohang.id) as lomoi'),'sanpham.id','sanpham.sanpham_ten','sanpham.sanpham_url','sanpham.sanpham_khuyenmai','sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap','lohang.lohang_so_luong_hien_tai','lohang.lohang_gia_ban_ra','donvitinh.donvitinh_ten','loaisanpham.loaisanpham_ten','sanpham.loaisanpham_id','sanpham.sanpham_anh','sanpham.sanpham_mo_ta')
                      ->groupBy('sanpham.id')
                      ->first();
                    ?>
          <li>
            <figure>
              <a class="aa-product-img" href="{!! url('san-pham',$sanpham->id,$sanpham->sanpham_url) !!}"><img src="{!! asset('resources/upload/sanpham/'.$sanpham->sanpham_anh) !!}" style="width: 250px; height: 300px;" alt="polo shirt img"></a>
              <a class="aa-add-card-btn" href="{!! url('mua-hang',[$sanpham->id,$sanpham->sanpham_url]) !!}"><span class="fa fa-shopping-cart"></span>Mua ngay</a>
              <figcaption>
                <h4 class="aa-product-title"><a href="{!! url('san-pham',$sanpham->id,$sanpham->sanpham_url) !!}">{!! $sanpham->sanpham_ten !!}</a></h4>
                <input type="hidden" name="txtqty" value="1" />
              </figcaption>
                                
                        
              <!-- product badge -->
              <span class="aa-badge aa-sold-out" >Khuyến mãi!</span>
              <span class="aa-product-price">
             <?php 
               $tyle = $khuyenmai->khuyenmai_phan_tram*0.01;
               $giakm = ($sanpham->lohang_gia_ban_ra - ($sanpham->lohang_gia_ban_ra * $tyle));
              ?> 
              {!! number_format($giakm,0,",",".") !!} vnđ
              </span>
              <span class="aa-product-price">
                <del>{!! number_format("$sanpham->lohang_gia_ban_ra",0,",",".") !!} vnđ</del>
              </span> 
              </figure> 
              <input type="hidden" name="txtopt" value="{!! $tyle !!}" />
            </li>
            @endforeach
                                                                                                      
            </ul>
          </div> 
          @else
            <article class="aa-blog-content-single" >                 
               <div class="aa-article-bottom">
               <p>
              Hiện tại cửa hàng chưa có chương trình khuyến mãi...
              </p>
                </div>
            </article>
          @endif
                   
              </div>
              </div>
              </div>        
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop