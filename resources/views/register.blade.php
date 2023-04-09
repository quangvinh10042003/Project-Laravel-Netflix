@extends('layouts.ads')
@section('style')
    <link rel="stylesheet" href="{{url('')}}/style/register.css">
@endsection
@section('main')
<body>
    <header class="row justify-content-between align-items-center">
        <h2 class="text-light icon-web pt-3"><a class="text-decoration-none" href="{{route('home.main')}}">NETFLIX</a></h2>
        <div class="login mt-2">
            <a href="{{route('home.login')}}" class="text-dark font-weight-bold link-login ">Đăng nhập</a>
        </div>
    </header>

    <main>
        <div class="content-lg mx-auto">
            <p>BƯỚC <span class="font-weight-bold">2/2</span></p>
            <form action="{{url('')}}/account" method="POST">
                @csrf
                <h2>Tạo mật khẩu để bắt đầu tư cách thành viên của bạn</h2>
                <p>Chỉ cần vài bước nữa là bạn sẽ hoàn tất!</p>
                <p>Chúng tôi cũng chẳng thích thú gì với các loại giấy tờ.</p>
                <div class="form-group-style">
                    <input type="text" class="form-control border-success input-sign" name="email" placeholder="Email">
                    @error('email')
                     <span class="err text-danger">{{$message}}</span>
                    @enderror
                </div>
               
                <div class="form-group-style">
                    <input type="text" name="name" class="form-control border-success input-sign" value="" placeholder="Tên">
                    @error('name')
                     <span class="err text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group-style">
                    <input type="text" name="cardNumber" class="form-control border-success input-sign" placeholder="Số thẻ" value="">
                       @error('cardNumber')
                     <span class="err text-danger">{{$message}}</span>
                     @enderror
                </div>
                <div class="form-group-style">
                    <input type="text" name="cvv" class="form-control border-success input-sign" value="" placeholder="Mã bảo mật (CVV)">
                       @error('cvv')
                     <span class="err text-danger">{{$message}}</span>
                     @enderror
                </div>
                <div class="form-group-style">
                    <input type="password" name="password" class="form-control border-success input-sign" placeholder="Mật Khẩu" value="">
                    @error('password')
                     <span class="err text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="label">
                        <label class="label-checkbox" for="checkbox">Vui lòng không gửi các ưu đãi đặc biệt của
                            Netflix qua email
                            cho tôi.</label>
                    </div>
                </div>
                <p class="font-foot">
                    Các khoản thanh toán của bạn sẽ được xử lý ở nước ngoài. Bạn có thể phải trả thêm phí ngân hàng.
                </p>

                <p class="font-foot">
                    Bằng cách đánh dấu vào hộp kiểm bên dưới, bạn đồng ý với <a href="#" class="text-primary">Điều khoản
                        sử dụng</a>,<a href="#" class="text-primary"> Tuyên bố về quyền riêng
                        tư</a> của chúng tôi, đồng thời xác nhận rằng bạn trên 18 tuổi. Netflix sẽ tự động gia hạn tư cách thành viên của bạn và tính phí thành viên vào phương thức thanh toán của bạn cho đến khi bạn hủy. Bạn có thể hủy bất kỳ lúc nào
                    để tránh bị tính phí về sau.
                </p>
                <div class="form-checkbox pb-4">
                    <input type="checkbox" id="checkbox">
                    <div class="label mt-0">
                        <label class="label-checkbox" for="checkbox">Tôi đồng ý</label>
                    </div>
                    <span class="err text-danger"></span>
                </div>
                <button type="submit" class="btn d-block input ">Tiếp Tục</button>
            </form>
        </div>
    </main>

    <div class="footer">
        <div class="container">
            <h4 class="text-secondary">Bạn có câu hỏi? Liên hệ với chúng tôi.</h4>
            <div class="row">
                <div class="col pt-2-6">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="text-secondary d-block pt-2" width="100%">Câu hỏi thường gặp</a>
                            <a href="#" class="text-secondary d-block pt-2" width="100%">Tùy chọn cookie</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="text-secondary d-block pt-2" width="100%">Trung tâm trợ giúp</a>
                            <a href="#" class="text-secondary d-block pt-2" width="100%">Thông tin doanh nghiệp</a>
                        </div>
                    </div>
                </div>

                <div class="col pt-2-6">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="text-secondary d-block pt-2" width="100%">Điều khoản sử dụng</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="text-secondary d-block pt-2" width="100%">Quyền riêng tư</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown open mr-md-4 mt-5">
                <button class="btn dropdown-toggle language" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-globe"></i><span class="d-none
                    d-md-inline d-sm-none text-secondary"> Tiếng Việt</span>
                </button>
                <div class="dropdown-menu bg-light language-items bg-secondary" style="width: 135px" aria-labelledby="triggerId">
                    <button class="dropdown-item text-secondary" href="#">English</button>
                </div>
            </div>
            <p class="text-secondary mt-3">Netflix việt nam</p>
        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            var emailReg = /^[a-z][a-zA-Z0-9._]*@[a-z0-9]{4,20}\.[a-z]{2,5}$/;
            var passwordReg = /\S{6,50}/;
            var ip0 = $(".input-sign")[0];
            var ip1 = $(".input-sign")[1];
            var err0 = $(".err")[0];
            var err1 = $(".err")[1];
            ip0.value = sessionStorage.getItem('email');
            ip0.addEventListener("keyup", () => {
                err0.innerHTML = "";
                ip0.classList.remove('border-danger');
            });
            ip1.addEventListener("keyup", () => {
                err0.innerHTML = "";
                ip1.classList.remove('border-danger');
            });

            ip1.addEventListener("keyup", () => {
                err1.innerHTML = ""
            });

            function onSubmit() {
                if (ip0.value == '') {
                    err0.innerHTML = 'Bạn cần nhập email';
                    ip0.classList.add('border-danger');
                    return false;
                } else {}
                if (!emailReg.test(ip0.value)) {
                    err0.innerHTML = 'Vui lòng nhập email hợp lệ';
                    ip0.classList.add('border-danger');
                    return false;
                } else {}

                if (ip1.value == '') {
                    err1.innerHTML = 'Bạn cần nhập email';
                    ip1.classList.add('border-danger');
                    return false;
                } else {}
                if (!passwordReg.test(ip1.value)) {
                    err1.innerHTML = 'Vui lòng nhập mật khẩu từ 6-50 kí tự';
                    ip1.classList.add('border-danger');
                    return false;
                } else {}
            }
        </script>
</body>
@endsection