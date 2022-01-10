<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/print_layout.css')}}">
		<title>In hóa đơn</title>
	</head>
	
	<body >
		<div class="shop-info">
			<span>CỬA HÀNG THỜI TRANG {!!$shop->name!!}</span><br>
			{!!$shop->address!!}<br>
			Số điện thoại: {!!$shop->phone_number!!}<br>
			Email: {!!$shop->email!!}<br>
			Website: {!!url();!!}
		</div><hr>
		<h2>ĐƠN ĐẶT HÀNG</h2>
		<table>
			<tr>
				<td width="120px"><strong>Khách hàng:</strong></td> <td>{!!$customer->name!!}</td>
				<td><strong></td>
			</tr>
			<tr>
				<td width="120px"><strong>Địa chỉ:</strong></td> <td>{!!$customer->address!!}</td>
				<td></td>
			</tr>
			<tr>
				<td width="120px"><strong>Điện tdoại:</strong></td> <td> {!!$customer->phone_number!!}</td>
				<td></td>
			</tr>
			<tr>
				<td width="120px"><strong>Email:</strong></td> <td> {!!$customer->email!!}</td>
				<td></td>
			</tr>
		</table><br><br>
		<table class="product-table" cellpadding="3px">
			<thead>
				<tr>
					<td><strong>STT</strong></td><td><strong>Tên sản phẩm</strong>
					</td><td><strong>Số lượng</strong></td><td><strong>Đơn giá</strong></td><td><strong>Thành tiền</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; ?>
				@foreach($order_detail as $item)
					<tr>
						<td>{!! ++$i; !!}</td>
						<td>{!! $item->product_name!!}</td>
						<td>{!! $item->quantity!!}</td>
						<td>{!! number_format($item->product_price, 0, ",", ".") !!}</td>
						<td>{!! number_format($item->product_price * $item->quantity, 0, ",", ".") !!}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<table class="sumary-table">
			<tr>
				<td width="565px">Giá trị đơn hàng</td>
				<td>{!! number_format($order->total_money, 0, ",", ".") !!}</td>
			</tr>
			<tr>
				<td width="565px">Phí vận chuyển</td>
				<td>{!! number_format($order->ship_cost, 0, ",", ".") !!}</td>
			</tr>
			<tr>
				<td width="565px">Tổng giá trị</td>
				<td class="total">{!! number_format($order->total, 0, ",", ".") !!}</td>
			</tr>
		</table><br>
		<table>
			
			<tr>
				<td width="500px"></td>
				<td>Ngày lập: <?php echo date("d-m-Y") ?></td>
			</tr>
			<tr>
				<td width="500px" class="customer-title">   <strong>Khách hàng</strong></td>
				<td class="writer-title"><strong>Người lập phiếu</strong></td>
			</tr>
			<tr>
				<td>(Ký và ghi rõ họ tên)</td>
				<td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
			</tr>
		</table>
	</body>
</html>