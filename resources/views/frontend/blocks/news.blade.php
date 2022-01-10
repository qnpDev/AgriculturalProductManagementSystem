
  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>Bài viết gần đây</h2>
            <div class="row">
              <!-- single latest blog -->
              <?php $monngon = DB::table('monngon')->orderBy('id','desc')->take(3)->get(); ?>
              @foreach ($monngon as $item)
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="{!! url('mon-ngon',$item->monngon_url) !!}"><img src="{!! asset('resources/upload/monngon/'.$item->monngon_anh) !!}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <br>
                      <span href="#"><i class="fa fa-clock-o"></i><p>{!!date("d-m-Y", strtotime("$item->created_at"))!!}</p></span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="{!! url('mon-ngon',$item->monngon_url) !!}">{!! $item->monngon_tieu_de !!}</a></h3>
                    <p>{!! $item->monngon_tom_tat !!}</p> 
                    <a href="{!! url('mon-ngon',$item->monngon_url) !!}" class="aa-read-mor-btn">Xem tiếp <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              @endforeach 
              
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->