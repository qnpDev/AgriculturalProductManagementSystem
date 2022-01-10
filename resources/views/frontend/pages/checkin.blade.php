@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! url('public/images/cartpannel.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Thanh toán</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Trang chủ</a></li>         
          <li class="active">Thanh toán</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / product category -->
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="{!! route('getThanhtoan') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
                  <div class="panel-body">
                       
                    <input type="submit" value="Hoàn tất mua hàng" class="aa-browse-btn">
                  </div>
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Thông tin khách hàng
                          </a>
                        </h4>
                      </div>
                      <input type="hidden" name="" value="{!! Auth::user()->id !!}" />
                      <?php 
                        $khachhang = DB::table('khachhang')->where('user_id',Auth::user()->id)->first();
                        // print_r($khachhang);
                      ?>
                      <input type="hidden" name="txtKHID" value="{!! $khachhang->id !!}" />
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="txtKHName" value="{{ $khachhang->khachhang_ten }}" placeholder="Họ và tên*" />
                              </div>                             
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="txtKHEmail" value="{{ $khachhang->khachhang_email }}"  placeholder="Mail*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="txtKHPhone" value="{{ $khachhang->khachhang_sdt }}"  placeholder="Số điện thoại*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="txtKHAddr"  placeholder="Địa chỉ*"> {{ $khachhang->khachhang_dia_chi }}</textarea>
                              </div>                             
                            </div>                            
                          </div>                                      
                        </div>
                      </div>
                    </div>
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Thông tin nhận hàng
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="txtNNName"  placeholder="Họ và tên*">
                                <div>
                                    {!! $errors->first('txtNNName') !!}
                                </div>
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="txtNNEmail"  placeholder="Email*">
                                <div>
                                    {!! $errors->first('txtNNEmail') !!}
                                </div>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="txtNNPhone"  placeholder="Số điện thoại*">
                                <div>
                                    {!! $errors->first('txtNNPhone') !!}
                                </div>
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="txtNNAddr"  rows="3" placeholder="Địa chỉ*"></textarea>
                                <div>
                                    {!! $errors->first('txtNNAddr') !!}
                                </div>
                              </div>                             
                            </div>                            
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="txtNNNote"  rows="3" placeholder="Ghi chú"></textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Đơn hàng</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Sản phẩm</th>
                          <th>Thành tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($content as $item)
                        <tr>
                          <td>{!! $item->name !!} <strong> x  {!! $item->qty !!}</strong></td>
                          <td>{!! number_format($item->price*$item->qty,0,",",".") !!} vnđ</td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Tổng cộng</th>
                          <td>{!! number_format($total,0,",",".") !!} vnđ</td>
                        </tr>
                        
                      </tfoot>
                    </table>
                  </div>
                  
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 <!-- Footer -->
@include('frontend.blocks.footer')
<!-- / Footer -->
@stop