<div class="aa-sidebar-widget">
            <h3>Nguyên liệu có sẵn tại cửa hàng</h3>
            <div class="aa-recently-views">
            <ul>
              @foreach ($nglieu as $item)
                <?php $sanpham = DB::table('sanpham')->where('sanpham.id',$item->sanpham_id)->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')->join('donvitinh','sanpham.donvitinh_id', '=', 'donvitinh.id' )->join('loaisanpham','sanpham.loaisanpham_id' , '=', 'loaisanpham.id')->select('sanpham.*', 'lohang.*','donvitinh.donvitinh_ten','loaisanpham.loaisanpham_ten')->first(); ?>
                <li>
                <a href="{!! url('san-pham',$sanpham->sanpham_url) !!}" class="aa-cartbox-img"><img src="{!! asset('resources/upload/sanpham/'.$sanpham->sanpham_anh) !!}"  style="width: 100px; height: 100px;"></a>
                <div class="aa-cartbox-info">
                  <h4><a href="{!! url('san-pham',$sanpham->sanpham_url) !!}">{!! $sanpham->sanpham_ten !!}</a></h4>
                  <p>{!! number_format("$sanpham->lohang_gia_ban_ra",0,",",".") !!} vnđ/{!! $sanpham->donvitinh_ten !!}</p>
                </div>                
                </li>
              @endforeach                                     
            </ul>
            </div>                            
          </div>