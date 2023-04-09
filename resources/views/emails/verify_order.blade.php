<h1 style="text-align: center">Xin chào: {{$order->name}}</h1>
<h3>Vào lúc {{date('d/m/Y H:i')}} bạn đã mua hàng tại<b style="color: red">Netflix</b> phải không?</h3>
<p style="font-size: 20px">
    Vui lòng kiểm tra lại và click vào nút bên dưới để xác thực.
</p>
<p style="font-size: 20px">
    Nếu sau 3p bạn không xác nhận thì hệ thống sẽ loại bỏ tài khoản của bạn!
</p>
<table border="1" cellspacing="0" cellpadding="10" align="center">
    <tr>
        <th>Họ tên</th>
        <th>{{$order->name}}</th>
    </tr>
    <tr>
        <td>Địa chỉ Email</td>
        <td>{{$order->email}}</td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td>{{$order->phone}}</td>
    </tr>
</table>

<h4>Chi tiết đơn hàng</h4>

<table border="1" cellspacing="0" cellpadding="10" align="center">
    <tr>
        <th>Tên Phim</th>
        <th>Thời gian</th>
        <th>Giá</th>
        <th>Vị trí</th>
        <th>Số luọng</th>
        <th>Thành tiền</th>
    </tr>
    <tr>
        <td>{{$order->film->name}}</td>
        <td>{{$order->timeline->timeline}}</td>
        <td>{{number_format(100000)}} đ</td>
        <td>{{$order->chair}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{number_format($order->quantity*100000)}}đ</td>
    </tr>
    <tr>
        <th colspan="5">Tổng tiền</th>
        <th>{{$order->totalPrice($order)}}</th>
    </tr>
</table>

<hr>
<div style="width: 200px; margin: 0 auto; padding: 20px 50px; border: 1px solid red; background: orange; text-align: center;" >
    <a style=" color: #fff; font-weight: bold" href="{{route('cart.verify_order', $token)}}">XÁC THỰC</a>
</div>
