<!doctype html>
<html lang="en">
  <head>
    <title>Netflix</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{url('style')}}/alert.css">
    @yield('style')
  </head>
  <body>
    <div class="alert">
      @if (Session::has('yes'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{Session::get('yes')}}
      </div>
      @endif
      @if (Session::has('no'))
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{Session::get('no')}}
      </div>
      @endif
    </div>
    @yield('main')
    @if(auth('acc')->check())
    <div class="modal fade" id="modelId0" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-light icon-web" style="color: red !important">NETFLIX</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="ml-4">
                            <span class="font-weight-bold text-history">Vé của bạn</span>
                        </div>
                        <div class="mr-4">
                            <a href="{{route('cart.clear')}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa hết</a>
                        </div>
                        
                    </div>
                     
                    <div class="list-group mt-4">
                        @foreach($cart->items as $key => $item)
                        <div class="ticketItem">
                            <div class="row">
                             <div class="col-lg-2 col-md-3 col-4 align-self-center">
                                 <img src="{{url('uploads')}}/{{$item->image}}" class="card-img" alt="">
                             </div>
                             <div class="col-lg-9 col-md-8 col-8">
                                 <h5>Tên phim: {{$item->name}} </h5>
                                 <p class="mb-0">Ngày: <b>{{date('d/m/Y', strtotime($item->timeline))}}</b> -- Giờ: <b>{{date('H:i', strtotime($item->timeline))}}</b></p> 
                                 <p class="mb-0">Vị trí: <b>{{$item->number}}</b></p>
                                 <p class="mb-0"> Ngày mua: <b> {{$item->time}} </b></p>
                             </div>
                            </div>
                            <a class="deleteTicket" href="{{route('cart.delete',$key)}}"><b><i class="fa-solid fa-x"></i></b></a>
                         </div>
                        @endforeach
                     
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-light icon-web" style="color: red !important">NETFLIX</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="account-modal">
                        <h5>Tài khoản</h5>
                        <div class="row pl-3">
                            <div class="col-8">
                                <div class="row align-items-center">
                                    <img src="{{url('')}}/images/object1.png" class="icon-account" alt="">
                                    <p class="pl-2 pt-2 font-italic modal-logout focus-item mb-0">Xin chào {{auth('acc')->user()->name}}</p>
                                    <p class="pl-2 pt-2 modal-logout mb-0 text-dark">Email: <b>{{auth('acc')->user()->email}}</b></p>
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <a class="text-secondary modal-logout logout" href="{{route('home.logout')}}">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modalFooter">
                    <div class="row">
                        <div class="col-6">
                            <a type="button" class="btn  but-in-account text-dark" btn-lg btn-block href="{{route('account.index')}}">
                                <i class="fas fa-user text-center"></i> Tài Khoản
                            </a>
                        </div>
                        <div class="col-6">
                            <a type="button" href="{{route('home.change_password')}}" class="btn but-in-account text-dark" btn-lg btn-block><i
                                class="fas fa-cog text-center"></i>
                                Đổi Mật Khẩu
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>