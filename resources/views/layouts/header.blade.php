<header>

    <div class="position-fixed header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-2 col-md-6">
                    <div class="row align-items-center">
                        <h2 class="text-light icon-web" style="color: red !important">NETFLIX</h2>
                        <nav class="nav justify-content-center pt-1 pl-3 d-none d-md-flex menu">
                            <a class="nav-link text-light actived list-menu" href="{{route('home.main')}}">Trang chủ</a>
                        </nav>
                    </div>
                </div>
                <div class="col-10  col-md-6 pt-3 pt-md-3 pt-lg-3">
                    <div class="row justify-content-between">
                        <div class="div"></div>
                        <div class="row pr-2">
                            @if (auth('acc')->check())
                            <div class="item-header position-relative" data-toggle="modal" data-target="#modelId0">
                                <p class="d-inline-block text-light text-menu-mobile text-header"><i class="fa-solid fa-clipboard-list text-light pr-1"></i>Vé của tôi</p>
                                <span class="totalcart">{{!empty($cart->totalQuantity) ? $cart->totalQuantity : 0 }}</span>
                            </div>
                            <div class="item-header account" data-toggle="modal" data-target="#modelId1">
                                <img src="{{url('')}}/images/object1.png" class="icon-account" alt="">
                                <i class="fa-solid fa-caret-down text-light text-header"></i>
                            </div>
                            @else
                            <a class="btn login mr-4" href="{{route('home.login')}}" role="button">Đăng Nhập</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

    <!-- Modal 0 -->
    

    <!-- Modal 1 -->
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
   