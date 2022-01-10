@extends('frontend.master')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! url('public/images/careerpanel.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Tuyển dụng</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">Tuyển dụng</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  </section>
  <!-- / product category -->
   <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-login">
                <h4>Thông tin tuyển dụng</h4>
                 @if (!is_null($tuyendung))
                 <article class="aa-blog-content-single" >                     
                     <div class="aa-article-bottom">
                  </div>
                  <?php 
                    $ngaybd =  date("Y-m-d", strtotime("$tuyendung->created_at")); // Năm/Tháng/Ngày
                    $ngaykt = date("Y-m-d",strtotime($ngaybd . "+ $tuyendung->tuyendung_thoi_gian  day"));
                  ?>

                    <p>
                    Thời gian khuyến mãi:
                    <button type="button" class="btn btn-danger">{{date('d-m-Y',strtotime($ngaybd))}}</button>
                    đến
                    <button type="button" class="btn btn-danger">{{date('d-m-Y',strtotime($ngaykt))}}</button>
                    </p>
                    <p><b><i>Yêu cầu và Mô tả công việc: </i></b></p>
                    <br>
                    <p>{!! $tuyendung->tuyendung_mo_ta !!}</p>
                    <hr>
                    <p><b><i>Liên hệ: </i></b></p>
                    <br>
                    <p>{!! $tuyendung->tuyendung_lien_he !!}</p>
                  </article>
                 @else
                 <p><i>Hiện tại chúng tôi chưa có nhu cầu tuyển dụng!</i></p>
                 @endif
                </div>
              </div>
            </div>          
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