<h1 style="text-align: center">Xin chào: {{$name}}</h1>
<h3>Có vẻ bạn đã quên mật khẩu của tài khoản <b style="color: red">Netflix</b> email: {{$email}} phải không?</h3>
<p style="font-size: 20px">
    Vui lòng click vào nút bên dưới để xác thực và tiếp tục lấy lại mật khẩu.
</p>
<p style="font-size: 20px">
    Nếu sau 3p bạn không xác nhận thì hệ thống sẽ loại bỏ tài khoản của bạn!
</p>
<div style="width: 200px; margin: 0 auto; padding: 20px 50px; border: 1px solid red; background: orange; text-align: center;" >
    <a style=" color: #fff; font-weight: bold" href="{{route('home.verifyAccountForget', $token)}}">XÁC THỰC</a>
</div>
