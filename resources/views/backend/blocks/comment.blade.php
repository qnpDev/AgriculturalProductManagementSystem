<div class="col-lg-6">
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i>
                Comment
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        <a href="#">
                                <i class="fa fa-refresh fa-fw"></i> Refresh
                            </a>
                    </button>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="chat">
                @foreach ($binhluan as $item)
                    <li class="left clearfix">
                        <!-- <span class="chat-img pull-left">
                            <?php $sp = DB::table('sanpham')->where('id',$item->sanpham_id)->first(); ?>
                            {{$sp->sanpham_ten}}
                        </span> -->
                        <span class="chat-img pull-left">
                            <img src="{!! url('public/images/avatar.jpg') !!}" alt="User Avatar" class="img-circle" style="width: 50px; height: 50px;"/>

                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">{{$item->binhluan_ten}}</strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> {!! $item->created_at !!}
                                </small>
                            </div>
                            <p>
                                {{$item->binhluan_noi_dung}}
                            </p>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="{!! URL::route('admin.binhluan.list') !!}" class="btn btn-default" type="button">View Details</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>