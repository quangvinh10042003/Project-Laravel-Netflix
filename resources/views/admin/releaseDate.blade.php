@extends('layouts.admin')
@section('title')
    Danh sách ngày chiếu phim
@endsection
@section('main')
<div class="row">
    <div class="row">
        <div class="col-md-4 col-lg-2 col-5">   
            <a href="{{route('release_date.create')}}" class="btn btn-warning d-block" role="submit"><i class="fa-solid fa-trash"></i> Xóa ngày cũ</a>
        </div>
        <div class="col-md-4 col-lg-3 col-5">
        <form action="{{route('release_date.store')}}" method="post">
            @csrf
            <input type="date" hidden name="release_date" value="">
            <button class="btn btn-success d-block" role="submit"><i class="fa-solid fa-edit"></i> Thêm một ngày tiếp theo</button>
        </form>
        </div>
        <div class="col-md-4 col-lg-6 col-5">
            <form class="float-end" action="" method="post">
                @csrf
                <input type="date" class="px-4 py-2 border rounded-2" name="release_date">
                <button class="btn btn-info mb-1" role="submit"><i class="fa-solid fa-edit"></i> Thêm mới tùy chỉnh</button>
            </form>
            </div>
      <div class="col-12">
        <div class="card mb-4">
            
          <div class="card-header pb-0">
            <h6>Danh sách ngày chiếu</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày Chiếu</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $key => $value)
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{$key}}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{$value->id}}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{$value->release_date}}</p>
                    </td>
                    <td class="align-middle text-end">
                      <form action="{{route('release_date.destroy',$value)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" role="submit">Xóa</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection