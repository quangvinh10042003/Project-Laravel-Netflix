@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="style/main.css">
@endsection
@section('main')
<div class="jumbotron container-fluid banner">
    <div class="box-banner">
        <div class="in-box">
            <h1 class="display-3 name-films text-light">ARCANE</h1>
            <p class="lead font-weight-bold text-light">Đang chiếu độc quền trên Netflix!</p>
            <p class="text-light more-infor-banner">Bộ phim đầu tiên được công ty game nổi tiếng Riot Games phát triển với nhân vật chính là chị em Vi - Powder, cặp đôi đầu duyên nợ trong tựa game League of Legend. ARCANE hứa hẹn sẽ kể 1 câu chuyện đầy khúc mắc của 2 chị em cùng với khung
                cảnh thành phố ngầm Zaun đối ngược với sự thịnh vượng của Piltover.</p>
            <p class="lead">
                <a class="btn btn-light btn-lg font-weight-bold button-banner" role="button"><span><i class="fa-solid fa-caret-right"></i></span> Phát</a>
            </p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h4 class="text-light pb-2">Phim Đang Chiếu</h4>
    @foreach ($films as $film)
    <div class="itemFilm mb-4">
        <div class="row">
            <div class="col-3">
                <img class="card-img" src="{{url('uploads')}}/{{$film->image}}" alt="">
            </div>
            <div class="col-9">
                <h2 class="text-light ">{{$film->name}}</h2>
                <p class="text-light"><b>Thể loại</b>: {{$film->category}}</p>
                <p class="text-light"><b>Diễn Viên</b>: {{$film->actor}}</p>
                <p class="text-light"><b>Thời lượng</b>: {{$film->time}} phút</p>
                <p class="text-light"><b>Nhà sản xuất</b>: {{$film->producer}}</p>
                <p class="text-light"><b>Nội dung</b>: {{$film->content}}</p>
                <a class="getTicket mt-3" href="{{linkDetail($film)}}">Đặt vé <i class="fa-solid fa-angle-right"></i></a> 
            </div>
        </div>
   </div>
    @endforeach
       
</div>
@endsection