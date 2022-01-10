@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! asset('resources/upload/nhom/'.$nhom->nhom_anh) !!}" alt="fashion img" style="width: 1920px; height: 300px;">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{!! $nhom->nhom_ten !!}</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">{!! $nhom->nhom_ten !!}</li>
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
            @include('frontend.blocks.head')
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach ($sanpham as $item)
                <?php 
                  $sanphamkhuyenmai = DB::select('select * from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1');
                ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="{!! url('san-pham',$item->sanpham_url) !!}"><img src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}"  style="width: 250px; height: 300px;"></a>
                    <a class="aa-add-card-btn" href="{!! url('mua-hang',[$item->id,$item->sanpham_url]) !!}"><span class="fa fa-shopping-cart"></span>Mua ngay</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{!! url('san-pham',$item->sanpham_url) !!}">{!! $item->sanpham_ten !!}</a></h4>
                      <input type="hidden" name="txtqty" value="1" />
                      @if ($item->sanpham_khuyenmai == 1) 
                       <!-- product badge -->

                    <span class="aa-badge aa-sold-out" >Khuyến mãi!</span>
                    <span class="aa-product-price">
                     <?php 
                        $tylegia = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 ');
                       $giakm = ($item->lohang_gia_ban_ra - ($tylegia[0]->khuyenmai_phan_tram*$item->lohang_gia_ban_ra * 0.01));
                       $tyle = $tylegia[0]->khuyenmai_phan_tram*0.01;
                      ?> 
                      
                        {!! number_format($giakm,0,",",".") !!} vnđ
                    </span>
                    <span class="aa-product-price">
                    <del>{!! number_format("$item->lohang_gia_ban_ra",0,",",".") !!} vnđ</del>
                    </span> 
                     <input type="hidden" name="txtopt" value="{!! $tyle !!}" /> 
                     @else
                         <span class="aa-product-price">
                         {!! number_format("$item->lohang_gia_ban_ra",0,",",".") !!} vnđ
                         </span>
                         <input type="hidden" name="txtopt" value="1" /> 
                    @endif
                      </figcaption>
                  </figure>
                </li> 
                @endforeach                                      
              </ul>

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
