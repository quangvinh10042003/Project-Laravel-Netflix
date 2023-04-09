@extends('layouts.admin')

@section('title')
    Thêm mới phim
@endsection

@section('style')
    <link rel="stylesheet" href="{{url('style')}}/admin/addFilm.css">
@endsection

@section('main')
    <form class="form col-10 mx-auto mb-5" enctype="multipart/form-data" action="{{route('film.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Tên Phim</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" aria-describedby="helpId">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Thể Loại</label>
                    <input type="text" name="category" id="" class="form-control" placeholder="Category" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Diễn Viên</label>
                    <input type="text" name="actor" id="" class="form-control" placeholder="Actors" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Nhà sản xuất</label>
                    <input type="text" name="producer" id="" class="form-control" placeholder="Producer" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="" class="form-label">Nội Dung</label>
                    <textarea name="content" cols="30" rows="5"  class="form-control" placeholder="Content" aria-describedby="helpId"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="" class="form-label">Thời gian (phút)</label>
                    <input type="number" name="time" id="" class="form-control" placeholder="Time" aria-describedby="helpId">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
        </div>
        <div class="col-md-4 mx-auto mt-5">
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </div>
    </form>
@endsection