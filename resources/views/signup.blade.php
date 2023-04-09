@extends('layouts.ads')
@section('style')
    <link rel="stylesheet" href="style/signup.css">
@endsection
@section('main')
<header class="row justify-content-between align-items-center">
    <h2 class="text-light icon-web pt-3"><a class="text-decoration-none" href="{{route('home.main')}}">NETFLIX</a></h2>
    <div class="login mt-2">
        <a href="{{route('home.login')}}" class="text-dark font-weight-bold link-login">Đăng nhập</a>
    </div>
</header>

<main>
    <div class="content mx-auto">
        <div class="img">
            <img class="card-img" src="images/step-img-signup.png" alt="">
        </div>
        <p class="text-center">BƯỚC <span class="font-weight-bold">1/2</span></p>
        <h2 class="text-center">Hoàn thành việc cài đặt tài khoản của bạn</h2>
        <p class="text-center">Netflix được cá nhân hóa cho riêng bạn. Tạo mật khẩu để xem Netflix trên bất kỳ thiết bị nào, vào bất cứ lúc nào.</p>
        <a class="btn input" href="{{ route('home.register')}}" role="button">Tiếp tục</a>
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

@endsection