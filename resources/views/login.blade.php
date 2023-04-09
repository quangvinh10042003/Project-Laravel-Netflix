@extends('layouts.ads')
@section('style')
    <link rel="stylesheet" href="style/login.css">
@endsection
@section('main')
<main>
    <div class="main">
        <h2 class="text-light icon-web pt-3"><a class="text-decoration-none" href="{{route('home.main')}}">NETFLIX</a></h2>

        <!-- form  -->
        <form class="mx-auto form" action="" method="POST">
            @csrf
            <h2 class="text-light pb-4">Đăng nhập</h2>
            @if(isset($err))
                <span class="err text-danger">{{$err}}</span>
            @endif
            <div class="form-items">
                <input type="text" name="email" class="form-control input" placeholder="Email hoặc số điện thoại">
                <span class="err text-danger"></span>
            </div>

            <div class="form-items position-relative">
                <input type="password" name="password" class="form-control input" placeholder="Mật khẩu">
                <span class="err text-danger"></span>
                <span class="change-type-pass text-light">HIỆN</span>
            </div>

            <button type="submit" class="btn d-block mx-auto
                but-submit text-light" btn-lg btn-block>
            Đăng nhập
            </button>
            <div class="form-items">
                <input type="checkbox" id="checkbox" class="remember" name="remember">
                <label for="checkbox" class="text-secondary">Ghi nhớ tôi</label>
            </div>

            <div class="form-text">
                <a href="{{route('home.forgetPassword')}}" class="text-secondary">Quên mật khẩu?</a>
            </div>
          
            <div class="form-text">
                <span class="text-secondary">Bạn mới tham gia Netflix?</span>
                <a href="{{route('account.create')}}" class="text-light font-weight-bold">Đăng ký ngay</a>
            </div>

            <div class="form-text">
                <p class="text-secondary">Trang này được Google reCAPTCHA bảo vệ để đảm bảo bạn không phải là robot. <a class="text-primary">Tìm hiểu thêm.</a></p>
            </div>
        </form>

        <div class="footer">
            <div class="container">
                <h4 class="text-secondary">Bạn có câu hỏi? Liên hệ với chúng tôi.</h4>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="text-secondary d-block pt-2" width="100%">Câu hỏi thường gặp</a>
                                <a href="#" class="text-secondary d-block pt-2" width="100%">Tùy chọn cookie</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="text-secondary d-block pt-2" width="100% pt-2">Trung tâm trợ giúp</a>
                                <a href="#" class="text-secondary d-block pt-2" width="100%">Thông tin doanh nghiệp</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="text-secondary d-block pt-2" width="100%">Điều khoản sử dụng</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="text-secondary pt-2" width="100%">Quyền riêng tư</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown open mr-md-4 mt-5">
                    <button class="btn btn-secondary dropdown-toggle language" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-globe"></i><span class="d-none
                                d-md-inline d-sm-none"> Tiếng Việt</span>
                    </button>
                    <div class="dropdown-menu language-items bg-secondary" style="width: 135px" aria-labelledby="triggerId">
                        <button class="dropdown-item text-light" href="#">English</button>
                    </div>
                </div>
                <p class="text-secondary mt-3">Netflix việt nam</p>
            </div>
        </div>
    </div>
</main>
@endsection