@extends('layouts.admin')
@section('title')
    Films
@endsection
@section('main')
<div class="row">
    <div class="row">
      <div class="col-md-4 col-lg-3 col-5">
        <a class="btn btn-info d-block" href="{{route('film.create')}}" role="button"><i class="fa-solid fa-plus"></i> Thêm mới</a>
      </div>
      <div class="col-md-8 col-lg-9 col-7 ">
        <form action="" class="float-end align-items-center" method="GET">
          @csrf
          <input type="text" name="keyword" class="py-2 px-1 ps-2 rounded search" placeholder="Tìm kiếm tên phim">
          <button class="btn btn-secondary mb-0" type="submit"><i class="fa-solid fa-search"></i></button>
        </form>
      </div>
    </div>
    
      <div class="col-12">
        <div class="card mb-4">
            
          <div class="card-header pb-0">
            <h6>Danh sách phim đang chiếu</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ảnh</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thời lượng</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thể Loại</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nhà sản xuất</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Tùy chọn</th>
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
                      <div>
                          <img src="{{url('uploads')}}/{{$value->image}}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{$value->name}}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{$value->time}}</p>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">{{$value->category}}</p>
                      </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">{{$value->producer}}</p>
                    </td>
                    <td class="align-middle text-center">
                      <form action="{{route('film.destroy',$value)}}" method="POST">
                        @csrf
                        @method('delete')
                        @canany(['admin', 'timeManager'])
                        <a class="btn btn-primary" href="{{route('timeline.show',$value)}}" role="button">Cài Đặt Lịch</a>
                        @endcanany
                        <a class="btn btn-success" role="button" href="{{route('film.edit',$value->id)}}">Chỉnh sửa</a>
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