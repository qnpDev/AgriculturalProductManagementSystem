<!-- <td>
                    <?php 
                        // $khachhang = DB::table('khachhang')->where('id',$item->khachhang_id)->first();
                        // $chitiet = DB::table('chitietdonhang')->where('donhang_id',$item->id)->get();
                    ?>
                        <a class="btn btn-defautl" data-toggle="modal" href='#{!! $item->id !!}'>Xem nhanh</a>
                        <div class="modal fade col-lg-12" id="{!! $item->id !!}" >
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Chi tiết đơn hàng</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-6">
                                            <h3 class="modal-title">Thông tin khách hàng</h3>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Tên</label>
                                            <input class="form-control"  value="{!! $khachhang->khachhang_ten !!}"  />
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>SĐT</label>
                                            <input class="form-control"  value="{!! $khachhang->khachhang_sdt !!}"  />
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  value="{!! $khachhang->khachhang_email !!}"  />
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea class="form-control" rows="3" name="txtLSPIntro" >{!! $khachhang->khachhang_dia_chi !!}</textarea>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h3 class="modal-title">Thông tin giao hàng</h3>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Người nhận hàng</label>
                                            <input class="form-control"  value="{!! $item->donhang_nguoi_nhan !!}"  />
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>SĐT</label>
                                            <input class="form-control"  value="{!! $item-> donhang_nguoi_nhan_sdt !!}"  />
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  value="{!! $item->donhang_nguoi_nhan_email !!}"  />
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea class="form-control" rows="3" name="txtLSPIntro"> {!! $item->donhang_nguoi_nhan_dia_chi !!}</textarea>
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" rows="3" name="txtLSPIntro" >{!! $item->donhang_ghi_chu !!}</textarea>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <h3 class="modal-title">Chi tiết sản phẩm</h3>
                                            <div class="table-responsive col-lg-12">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Sản phẩm</th>
                                                            <th>Đơn giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        @foreach ($chitiet as $val)
                                                            <tr>
                                                                <td>{!! $count = $count + 1 !!}</td>
                                                                <td>
                                                                    <?php  
                                                                        // $sp = DB::table('sanpham')->where('id',$val->sanpham_id)->first();
                                                                        // print_r($sp->sanpham_ten);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                {!! number_format($val->chitietdonhang_thanh_tien/$val->chitietdonhang_so_luong,0,",",".") !!} vnđ 
                                                                </td>
                                                                <td>{!! $val->chitietdonhang_so_luong !!}</td>
                                                                <td>{!! number_format("$val->chitietdonhang_thanh_tien",0,",",".") !!} vnđ </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            

                                        </div>
                                        <div class="row">
                                            <b>Tổng tiền: {!! number_format("$item->donhang_tong_tien",0,",",".") !!} vnđ</b>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td> -->