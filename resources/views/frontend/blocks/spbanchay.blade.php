<div class="aa-sidebar-widget">
  <h3>Sản phẩm bán chạy</h3>
  <div class="aa-recently-views">
    <ul>
    <?php
    // $a =DB::select('select month(now())-1 as thang') ;
    // print_r($a[0]->thang);
        $sanpham = DB::table('sanpham')
          ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
          ->join('chitietdonhang', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
          ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
          ->select(DB::raw('sum(lohang.lohang_so_luong_da_ban) as daban'),'sanpham.id','sanpham.sanpham_ten','sanpham.sanpham_url','sanpham.sanpham_khuyenmai','sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap','lohang.lohang_so_luong_hien_tai','lohang.lohang_gia_ban_ra')
         ->groupBy('sanpham.id')
         ->orderBy('daban','desc')
         ->take(10)
         ->get(); 
         // print_r($sanpham);
        // $sanpham = DB::table('sanpham')
        //     ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
        //     ->select(DB::raw('sum(lohang.lohang_so_luong_da_ban) as daban'),'sanpham.id','sanpham.sanpham_ten','sanpham.sanpham_url','sanpham.sanpham_khuyenmai','sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap','lohang.lohang_so_luong_hien_tai','lohang.lohang_gia_ban_ra')
        //      ->groupBy('sanpham.id')
        //      ->orderBy('daban','desc')
        //      ->take(10)
        //      ->get(); 
              ?>
    @foreach ($sanpham as $item)
      <li>
        <a  href="{!! url('san-pham',$item->sanpham_url) !!}" class="aa-cartbox-img"><img alt="img" src="{!! asset('resources/upload/sanpham/'.$item->sanpham_anh) !!}"></a>
        <div class="aa-cartbox-info">
          <h3 style="font: 20px arial, sans-serif;"><a  href="{!! url('san-pham',$item->sanpham_url) !!}">{!! $item->sanpham_ten !!}</a></h3>
          <p style="color:rgb(230, 0, 0); font:20px arial;">{!! number_format("$item->lohang_gia_ban_ra",0,",",".") !!} vnđ</p>
        </div>                    
      </li>
    @endforeach                                     
    </ul>
  </div>                            
</div>