@extends('layouts.admin')
@section('title')
    Thông tin lịch chiếu phim
@endsection
@section('style')
    <link rel="stylesheet" href="{{url('style')}}/admin/info.css">
@endsection
@section('main')
    <div class="section">
        <div class="card col-lg-9 col-md-10 col-12  mb-3" >
            <div class="row g-0">
              <div class="col-md-2">
                <img src="{{url('uploads')}}/{{$film->image}}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-10">
                <div class="card-body">
                  <h5 class="card-title">{{$film->name}}</h5>
                  <p class="card-text">Thể loại: {{$film->category}}</p>
                  <p class="card-text"><small class="text-muted">Id: {{$film->id}}</small></p>
                  <p class="card-text"><small class="text-muted">Thời lượng: {{$film->time}}</small></p>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="card px-2 py-2 ps-2">
        <h4 class="ms-4"><b>//</b> Ngày chiếu </h4>
        @foreach($rdList as $date)
        <div class="row align-items-center">
          <div class="col-md-6">
            <h5> - Lịch chiếu vào ngày: <b>{{$date->release_date}}</b></h5>
          </div>
          <div class="col-md-6">
            <form action="{{route('timeline.store')}}" method="POST" class="mb-1">
              @csrf
              <input type="text" name="release_id" value="{{$date->id}}" hidden>
              <input type="text" name="film_id" value="{{$film->id}}" hidden>
              <input type="text" name="rd" value="{{$date->release_date}}" hidden>
              <input type="time" name="timeline" class="px-4 py-1">
              
              <button class="btn btn-primary mb-0" role="submit">Thêm mới thời gian</button>
            </form>
          </div>
        </div>
        <div class="row mb-4">
            @foreach ($listTimelines as $timeline)
            @if($timeline->release_id == $date->id)
            <div class="col-lg-2 col-md-2 col-3 text-center ">
                <div class="timeLine">
                    <form action="{{route('timeline.update',$timeline)}}" method="post">
                      @csrf @method('PUT')
                      <input type="time" name="timeline" class="fw-bold" value="{{date('H:i',strtotime($timeline->timeline))}}">
                      <input type="text" name="film_id" class="fw-bold" value="{{$film->id}}" hidden>
                      <input type="text" name="release" class="fw-bold" value="{{$date->release_date}}" hidden>
                      <button class="updateTime text-success" type="submit"><i class="fa-solid fa-edit fw-bolder "></i> Save</button>
                    </form>
                    <form action="{{route('timeline.destroy',$timeline)}}" method="post">
                      @csrf @method('DELETE')
                      <button class="deleteTime" type="submit"><i class="fa-solid fa-x fw-bolder text-danger"></i></button>
                    </form>
                </div>
            </div>  
            @endif
            @endforeach
        </div>
        @endforeach
       
    </div>
@endsection