  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="{!! url('/') !!}">Trang chủ</a></li>
                    <?php 
                      $nhom =  DB::table('nhom')->get();
                     ?>
                     @foreach ($nhom as $menu_1)
                      <li><a href="{!! url('nhom-thuc-pham',$menu_1->nhom_url) !!}">{!! $menu_1->nhom_ten !!}</a>
                      </li>
                      @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Trang liên quan</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="{!! url('khuyen-mai') !!}">Khuyến mãi</a></li>
                      <li><a href="{!! url('mon-ngon') !!}">Món ngon</a></li>            
                      <li><a href="{!! url('tuyen-dung') !!}">Tuyển dụng</a></li>
                      <li><a href="{!! url('lien-he') !!}">Liên hệ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <!-- <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div> -->
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên hệ</h3>
                    <address>
                      <p>Địa chỉ</p>
                      <p><span class="fa fa-phone"></span>08.2222.6618</p>
                      <p><span class="fa fa-envelope"></span>npq171@gmail.com</p>
                    </address>
                     <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Design by <a href="#">QNP</a></p>
            <div class="aa-footer-payment">
               <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span> 
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    
  </footer>
  <!-- / footer -->