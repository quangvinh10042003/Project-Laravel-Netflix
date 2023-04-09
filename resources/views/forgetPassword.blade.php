@extends('layouts.master')
@section('title')
    Quên mật khẩu
@endsection
@section('style')
   <link rel="stylesheet" href="{{url('style')}}/verify.css">
@endsection
@section('main')
    <main>
        <div class="main">
            <div class="col-lg-5 col-md-7 col-11 mx-auto verify">
                <form action="" method="post">
                    @csrf
                    <h1 class="text-center">NETFLIX</h1>
                    <h4>Có vẻ bạn đang gặp sự cố với mật khẩu của mình</h4>
                    <h4>Vui lòng nhập Email để tiến hành lấy lại mật khẩu.</h4>
                    <div class="form-items px-2 py-2 mt-5">
                        <input type="text" name="email" class="form-control input" placeholder="Email hoặc số điện thoại">
                        <span class="err text-danger"></span>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger rounded-0 continue py-2" role="submit">Tiếp tục</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection