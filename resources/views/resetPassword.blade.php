@extends('layouts.master')
@section('title')
    Thiết lập lại mật khẩu
@endsection
@section('style')
   <link rel="stylesheet" href="{{url('style')}}/verify.css">
@endsection
@section('main')
    <main>
        <div class="main">
            <div class="col-lg-5 col-md-7 col-11 mx-auto verify">
                <form action="" method="post">
                    @csrf @method('PUT')
                    <h1 class="text-center">NETFLIX</h1>
                    <h4>Xác thực thành công! Xin chào {{$account->name}}.</h4>
                    <h4>Vui lòng thiết lập lại mật khẩu của bạn.</h4>
                    <input type="hidden" name="id" value="{{$account->id}}">
                    <div class="form-items px-2 py-2 mt-5">
                        <input type="text" name="newPassword" class="form-control input" placeholder="Mật khẩu">
                        @error('newPassword')
                            <span class="err text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-items px-2 py-2 mt-5">
                        <input type="text" name="confirmPassword" class="form-control input" placeholder="Nhập lại mật khẩu">
                        @error('confirmPassword')
                            <span class="err text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger rounded-0 continue py-2" role="submit">Tiếp tục</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection