<div class="aa-sidebar-widget">
  <h3>Bài viết mới</h3>
  <div class="aa-recently-views">
  <?php $monngon = DB::table('monngon')->orderBy('id','desc')->take(5)->get(); ?>
    <ul>
    @foreach ($monngon as $item)
      <li>
        <a href="{!! url('mon-ngon',$item->monngon_url) !!}"><img src="{!! asset('resources/upload/monngon/'.$item->monngon_anh) !!}" alt="img"  style="width: 100px; height: 100px;"></a>
        <div class="aa-cartbox-info">
          <h4><a href="{!! url('mon-ngon',$item->monngon_url) !!}">{!! $item->monngon_tieu_de !!}</a></h4>
          <p>{{date("d-m-Y", strtotime("$item->created_at"))}}</p>
        </div>                    
      </li>
    @endforeach                                         
    </ul>
  </div>                            
</div>