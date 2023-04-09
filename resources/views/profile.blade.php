@extends('layouts.master')
@section('title')
    Thông tin cá nhân
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{url('')}}/style/profile/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="{{url('')}}/style/profile/fullpage.min.css">

<link rel="stylesheet" href="{{url('')}}/style/profile/animate.css">

<link rel="stylesheet" href="{{url('')}}/style/profile/templatemo-style.css">

<link rel="stylesheet" href="{{url('')}}/style/profile/responsive.css">
@endsection
@section('main')
<div id="video">
    <video autoplay muted loop id="myVideo">
      <source src="{{url('images')}}/profile/wednesday-addams-official-trailer-netflix.mp4" type="video/mp4">
    </video>
    <div id="fullpage" class="fullpage-default">
        <div class="section animated-row" data-section="slide02">
            <div class="section-inner pt-0">
                <div class="about-section">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 wide-col-laptop">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="about-contentbox">
                                        <div class="animate" data-animate="fadeInUp">
                                            <h2 class="ml-4">Xin chào {{auth('acc')->user()->name}}</h2>
                                                <form action="" method="post">
                                                    @csrf @method('put')
                                                    <div class="form-group">
                                                      <label for="">Tên người dùng</label>
                                                      <input type="text" value="{{auth('acc')->user()->name}}" name="name" id="" class="form-control bg-light text-dark" aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Địa chỉ Email</label>
                                                        <input type="text" value="{{auth('acc')->user()->email}}" name="email" id="" class="form-control bg-light text-dark" aria-describedby="helpId">
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-9">
                                                            <div class="form-group">
                                                                <label for="">Số Thẻ</label>
                                                                <input type="text" name="cardNumber" value="{{auth('acc')->user()->cardNumber}}"  id="" class="form-control bg-light text-dark" aria-describedby="helpId">
                                                              </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="">Mã CVV</label>
                                                                <input type="text" name="cvv" id="" value="{{auth('acc')->user()->cvv}}" class="form-control bg-light text-dark" aria-describedby="helpId">
                                                              </div>
                                                        </div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label for="">Nhập mật khẩu để xác nhận</label>
                                                        <input type="password" name="password" value="" class="form-control bg-light text-dark" aria-describedby="helpId" placeholder="Enter password to confirm change">
                                                      </div>
                                                      <div class="form-group">
                                                        <button class="btn btn-primary d-block mx-auto" type="submit">Lưu</button>
                                                      </div>
                                                </form>
                                      
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <figure class="about-img animate mt-5" data-animate="fadeInUp"><img src="{{url('')}}/images/object1.png" class="rounded" alt=""></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('')}}/js/jquery.js"></script>

<script src="{{url('')}}/js/bootstrap.min.js"></script>

{{-- <script src="{{url('')}}/js/fullpage.min.js"></script> --}}

<script src="{{url('')}}/js/scrolloverflow.js"></script>

{{-- <script src="{{url('')}}/js/owl.carousel.min.js"></script> --}}

<script src="{{url('')}}/js/jquery.inview.min.js"></script>

<script src="{{url('')}}/js/form.js"></script>

<script src="{{url('')}}/js/custom.js"></script>
@endsection