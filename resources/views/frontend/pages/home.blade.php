@extends('frontend.master')
@section('content')
<!-- Start slider -->
@include('frontend.blocks.slide')
<!-- / slider -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <ul class="nav nav-tabs aa-products-tab">
                      <li class="active"><a href="#men" data-toggle="tab">Sản phẩm mới</a></li>
                    </ul>
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" >
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @foreach ($sanpham as $item)
                        <?php 
                          $sanphamkhuyenmai = DB::select('select* from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1');
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
                    <!-- / men product category -->
                  </div>            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
<!-- Support section -->
@include('frontend.blocks.trans')
<!-- / Support section -->
<!-- Latest Blog -->
@include('frontend.blocks.news')
<!-- / Latest Blog -->
<!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop

