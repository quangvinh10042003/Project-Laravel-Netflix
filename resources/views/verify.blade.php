@extends('layouts.master')
@section('title')
    Xác thực email
@endsection
@section('style')
   <link rel="stylesheet" href="{{url('style')}}/verify.css">
@endsection
@section('main')
    <main>
        <div class="main">
            <div class="col-lg-5 col-md-7 col-11 mx-auto verify">
                <h1 class="text-center">NETFLIX</h1>
                <h4>Chúng tôi vừa gửi tới địa chỉ Email của bạn 1 tin nhắn xác thực.</h4>
                <h4>Vui lòng xác thực để tiếp tục.</h4>
                <h6 class="text-center mt-3 text-secondary font-italic">Hoặc</h6>
                <div class="text-center ">
                    <a class="btn btn-danger rounded-0 px-3 py-2 " href="{{route('home.main')}}" role="button">Trở lại trang chủ</a>
                </div>
                
            </div>
        </div>
    </main>
@endsection