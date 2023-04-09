@extends('layouts.master')
@section('title')
    Thanh Toán
@endsection
@section('style')
   <link rel="stylesheet" href="{{url('style')}}/checkout.css">
@endsection
@section('main')
<main>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="content-lg">
                
                        <form action="{{route('cart.checkout')}}" method="POST">
                            @csrf
                            <h2 class="text-center">Thanh toán</h2>
                            <p class="text-center">Chỉ cần vài bước nữa là bạn sẽ hoàn tất!</p>
                            <p class="text-center">Chúng tôi cũng chẳng thích thú gì với các loại giấy tờ.</p>
                            <div class="form-group-style">
                                <input type="text" value="{{auth('acc')->user()->email}}" class="form-control border-success input-sign" name="email" placeholder="Email">
                                @error('email')
                                 <span class="err text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                            <div class="form-group-style">
                                <input type="text" name="name" value="{{auth('acc')->user()->name}}"  class="form-control border-success input-sign"  placeholder="Tên người đăng ký">
                                @error('name')
                                 <span class="err text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group-style">
                                <input type="text" name="phone" class="form-control border-success input-sign"  placeholder="Số điện thoại">
                                @error('phone')
                                 <span class="err text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group-style">
                                <input type="text" name="cardNumber" value="{{auth('acc')->user()->cardNumber}}" class="form-control border-success input-sign" placeholder="Số thẻ" >
                                   @error('cardNumber')
                                 <span class="err text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                            <div class="form-group-style">
                                <input type="text" name="cvv" value="{{auth('acc')->user()->cvv}}" class="form-control border-success input-sign"  placeholder="Mã bảo mật (CVV)">
                                   @error('cvv')
                                 <span class="err text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                            <div class="form-group-style">
                                <textarea name="order_note" class="form-control border-success input-sign" rows="5" placeholder="Chú thích"></textarea>
                                   @error('order_note')
                                 <span class="err text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                            <p class="font-foot">
                                Các khoản thanh toán của bạn sẽ được xử lý ở nước ngoài. Bạn có thể phải trả thêm phí ngân hàng.
                            </p>
                            <div class="form-checkbox pb-4">
                                <input type="checkbox" id="checkbox">
                                <div class="label mt-0">
                                    <label class="label-checkbox" for="checkbox">Tôi đồng ý</label>
                                </div>
                                <span class="err text-danger"></span>
                            </div>
                            @if (isset($film))
                                <input type="hidden" name="film_id" value="{{$film->id}}">
                                <input type="hidden" name="timeline_id" value="{{$timeline->id}}">
                                <input type="hidden" name="quantity" value="{{$quantity}}">
                                <input type="hidden" name="chair" value="{{$chair}}">
                                <button type="submit" class="btn d-block input ">Tiếp Tục</button>
                            @else
                            <a type="button" disable class="btn d-block input ">Quay lại chọn phim</a>
                            @endif
                          
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="billBox px-2 py-3">
                        <div class="col-lg-10 col-md-11 col-12  mx-auto text-light">
                            @if(@isset($film))
                                <h3 class="text-danger text-center mt-5">{{$film->name}}</h3>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <p class="mb-0">Ngày chiếu: <b>{{date('d/m/Y',strtotime($timeline->timeline))}}</b></p>
                                    </div>
                                    <div class="col-6 text-right">
                                        <p class="mb-0">Khung giờ: <br> <b>{{date('H:i',strtotime($timeline->timeline))}}</b></p>
                                    </div>
                                </div>
                            
                                <img src="{{url('uploads')}}/{{$film->image}}" class="card-img mt-4" alt="">
                                <p class="mt-3 mb-0 ">Ví trí ghế: 
                                    <b>
                                        {{$chair}}
                                    </b>
                                </p>
                                <p class="mb-0">Số lượng vé: <b> {{$quantity}}</b></p>
                                <p class="mb-5">Thành tiền: <b>{{number_format($quantity*100000)}}đ</b></p>
                            @else
                                <h3 class="text-center mt-4">Bạn chưa lựa chọn ghế và phim nên sẽ không thể thực hiện thanh toán.</h3>
                                <h5 class="text-center mt-4 mb-5">Vui lòng ấn vào <a class="text-danger" href="{{route('home.main')}}">Đây</a> để quay lại.</h5>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
  
</main>
@endsection