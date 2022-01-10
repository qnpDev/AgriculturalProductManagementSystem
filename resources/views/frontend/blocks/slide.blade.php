  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <?php 
            $data = DB::table('quangcao')->where('quangcao_trang_thai',1)->get();
            ?>
            @foreach ($data as $item)
            <li>
              <div class="seq-model">
                <img data-seq src="{!! asset('resources/upload/quangcao/'.$item->quangcao_anh) !!}" alt="Men slide img" style="height: 300px;"/>
              </div>
            </li>
            @endforeach              
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons" style="margin-top:-150px;">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->