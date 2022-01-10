@extends('frontend.master')
@section('content')

  <!-- / product category -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">                        
                    <h2><a href="#">{!! $monngon->monngon_tieu_de !!}</a></h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-date">
                        {!! $monngon->created_at !!}
                      </div>
                    </div>
                    <figure class="aa-blog-img">
                      <a href="#"><img src="{!! asset('resources/upload/monngon/'.$monngon->monngon_anh) !!}"  style="width: 500px; height: 300px;"></a>
                    </figure>
                    <p>{!! $monngon->monngon_tom_tat !!}</p>
                    <p>{!! $monngon->monngon_noi_dung !!}</p>
                    <div class="blog-single-bottom">
                      <div class="row">
                        <!-- <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class="blog-single-tag">
                            <span>Nguồn:</span>
                            <a href="#">Fashion,</a>
                            <a href="#">Beauty,</a>
                            <a href="#">Lifestyle</a>
                          </div>
                        </div> -->
                        <!-- <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-single-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                          </div>
                        </div> -->
                      </div>
                    </div>
                   
                  </article>
                  <!-- Content Comment threats -->

                  <!-- /Content Comment threats -->
                  <!-- blog comments form -->

                  <!-- /blog comments form -->
                </div>
              </div>

              <!-- blog sidebar -->
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <!-- single sidebar -->
          <!-- Nguyên liệu -->
          @include('frontend.blocks.nglieu')
          <!-- /Nguyên liệu -->
          <!-- Bài viết gần đây -->
            @include('frontend.blocks.latest')
          <!-- /Bài viết gần đây     -->
                </aside>
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