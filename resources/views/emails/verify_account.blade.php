<h1 style="text-align: center">Xin chào: {{$name}}</h1>
<h3>Bạn đã đăng ký tài khoản <b style="color: red">Netflix</b> tại email: {{$email}} phải không?</h3>
<p style="font-size: 20px">
    Vui lòng click vào nút bên dưới để xác thực tài khoản.
</p>
<p style="font-size: 20px">
    Nếu sau 3p bạn không xác nhận thì hệ thống sẽ loại bỏ tài khoản của bạn!
</p>
<a style=" color: #fff; font-weight: bold" href="{{route('home.verify_account', $token)}}">
<div style="width: 200px; margin: 0 auto; padding: 20px 50px; border: 1px solid red; background: orange; text-align: center;" >
    XÁC THỰC
</div>
</a>
