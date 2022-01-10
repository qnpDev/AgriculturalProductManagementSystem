<div class="aa-product-catg-pagination">
  <nav>
    <ul class="pagination">
    @if ($sanpham->currentPage() != 1)
      <li>
        <a href="{!! str_replace('/?','?',$sanpham->url($sanpham->currentPage() - 1)) !!}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    @endif
    @for ($i = 1; $i <=  $sanpham->lastPage(); $i++)
      <li class="{!! ($sanpham->currentPage() == $i)? 'active':'' !!}"><a href="{!! str_replace('/?','?',$sanpham->url($i)) !!}">{!! $i !!}</a></li>
    @endfor
    @if ($sanpham->currentPage() != $sanpham->lastPage())
      <li>
        <a href="{!! str_replace('/?','?',$sanpham->url($sanpham->currentPage() + 1)) !!}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    @endif
      
    </ul>
  </nav>
</div>