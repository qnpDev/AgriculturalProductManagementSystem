@extends('frontend.master')
@section('content')

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{!! url('public/images/ooooo.jpg') !!}" alt="fashion img" style="width: 1920px; height: 300px;" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Món ngon</h2>
        <ol class="breadcrumb">
          <li><a href="{!! url('/') !!}">Home</a></li>         
          <li class="active">Món ngon</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / product category -->

  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area aa-blog-archive-2">
            <div class="row">             
        
                <div class="aa-blog-content">
                  <div class="row">
                  @foreach ($monngon as $item)
                  <div class="col-md-4 col-sm-4">
                      <article class="aa-latest-blog-single">
                        <figure class="aa-blog-img">                    
                          <a href="{!! url('mon-ngon',$item->monngon_url) !!}"><img src="{!! asset('resources/upload/monngon/'.$item->monngon_anh) !!}"  style="width: 450px; height: 220px;"></a>  
                            <figcaption class="aa-blog-img-caption">
                            <span href="{!! url('mon-ngon',$item->monngon_url) !!}"><i class="fa fa-clock-o"></i>{!! $item->created_at !!}</span>
                          </figcaption>                          
                        </figure>
                        <div class="aa-blog-info">
                          <h3 class="aa-blog-title"><a href="{!! url('mon-ngon',$item->monngon_url) !!}">{!! $item->monngon_tieu_de !!}</a></h3>
                          <p>{!! cut($item->monngon_tom_tat,100) !!}</p> 
                          <a class="aa-read-mor-btn" href="{!! url('mon-ngon',$item->monngon_url) !!}">Xem tiếp <span class="fa fa-long-arrow-right"></span></a>
                        </div>
                      </article>
                    </div>
                @endforeach            
                  </div>
                </div>
                <!-- Blog Pagination -->
                <div class="aa-blog-archive-pagination">
                  <nav>
                    <ul class="pagination">
                    @if ($monngon->currentPage() != 1)
                      <li>
                        <a href="{!! str_replace('/?','?',$monngon->url($monngon->currentPage() - 1)) !!}" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                    @endif
                    @for ($i = 1; $i <=  $monngon->lastPage(); $i++)
                      <li class="{!! ($monngon->currentPage() == $i)? 'active':'' !!}"><a href="{!! str_replace('/?','?',$monngon->url($i)) !!}">{!! $i !!}</a></li>
                    @endfor
                    @if ($monngon->currentPage() != $monngon->lastPage())
                      <li>
                        <a href="{!! str_replace('/?','?',$monngon->url($monngon->currentPage() + 1)) !!}" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    @endif
                      
                    </ul>
                  </nav>
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