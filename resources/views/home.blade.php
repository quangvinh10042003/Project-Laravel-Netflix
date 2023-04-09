@extends('layouts.ads')
@section('style')
    <link rel="stylesheet" href="{{url('')}}/style/home.css">
@endsection
@section('main')
<header>
    <div class="container-fluid header">
        <div class="row justify-content-between align-items-center
                head-menu">
            <h2 class="text-light icon-web mt-3"><a class="text-decoration-none" href="{{route('home.main')}}">NETFLIX</a></h2>
            <div class="language-login mt-3">
                <div class="row">
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
                        <div class="dropdown open mr-md-4">
                            <button class="btn btn-secondary dropdown-toggle
                                    language" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-globe"></i><span class="d-none d-md-inline d-sm-none">
                                    Tiếng Việt</span>
                            </button>
                            <div class="dropdown-menu language-items
                                    bg-secondary" aria-labelledby="triggerId">
                                <button class="dropdown-item text-light" href="#">
                                    English
                                </button>
                            </div>
                        </div>
                        <a class="btn login" href="{{route('home.login')}}" role="button">Đăng Nhập</a>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="container text-header">
            <div class="jumbotron text-header">
                <h1 class="display-3 text-light text-center h1-header">
                    Chương trình truyền hình, phim không giới hạn và nhiều nội dung khác.
                </h1>
                <p class="lead text-light text-center mt-3 p1-header">
                    Xem ở mọi nơi. Hủy bất kỳ lúc nào.
                </p>
                <p class="text-light text-center p2-header">
                    Bạn đã sẵn sàng xem chưa? Nhập email để tạo hoặc kích hoạt lại tư cách thành viên của bạn.
                </p>
            </div>
            <div class="email-login mx-auto">        
                        <a type="button" href="{{route('account.create')}}" class="btn btn-lg btn-block button-email
                                text-light mx-auto">
                            Bắt đầu <i class="fa-solid fa-arrow-right"></i>
                        </a>
            </div>
        </div>
    </div>
</header>
<div class="info">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="jumbotron text-header">
                    <h1 class="display-3 text-light h1-info1">
                        Thưởng thức trên TV của bạn.
                    </h1>
                    <p class="lead text-light mt-3 p1-header">
                        Xem trên TV thông minh, Playstation, Xbox, Chromecast, Apple TV, đầu phát Blu-ray và nhiều thiết bị khác.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 box-video">
                    <img class="card-img-top" src="images/tv.png" alt="" />
                    <div class="video">
                        <video class="card-img video-tv" autoplay muted loop src="images/video-tv-0819.m4v"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- info2  -->
<div class="info">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 box-info2 position-relative">
                    <img class="card-img-top" src="images/mobile-0819.jpg" alt="" />
                    <div class="name-info2 position-absolute">
                        <div class="row align-items-center">
                            <img src="images/info-img1.png" class="info2-img" alt="" />
                            <div class="text">
                                <div class="text-0 text-light
                                        font-weight-bold">
                                    Cậu bé mất tích
                                </div>
                                <div class="text-1 text-primary">Đang tải xuống...</div>
                            </div>
                            <div class="download"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="jumbotron text-header">
                    <h1 class="display-3 text-light h1-info1">
                        Tải xuống nội dung để xem ngoại tuyến.
                    </h1>
                    <p class="lead text-light mt-3 p1-header">
                        Lưu lại những nội dung yêu thích một cách dễ dàng và luôn có thứ để xem.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- info3  -->
<div class="info">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="jumbotron text-header">
                    <h1 class="display-3 text-light h1-info1">
                        Xem ở mọi nơi. Với kho phim siêu hot
                    </h1>
                    <p class="lead text-light mt-3 p1-header">
                        Phát trực tuyến không giới hạn phim và chương trình truyền hình trên điện thoại, máy tính bảng, máy tính xách tay và TV.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="carouselId" class="carousel slide text-header" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                        <li data-target="#carouselId" data-slide-to="3"></li>
                        <li data-target="#carouselId" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner card-infor3" role="listbox">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img class="card-img" src="images/phim1.webp" alt="First slide" />
                                </div>

                                <div class="col-lg-6">
                                    <div class="jumbotron text-header
                                            item-films">
                                        <h1 class="display-3 text-light
                                                h1-items">Daredevil</h1>
                                        <p class="lead text-light mt-3
                                                p1-items">
                                            Bộ phim về tràng siêu anh hùng MARVEL sáng làm luật sư tối diệt trừ cái ác.
                                        </p>
                                        <a class="btn btn-danger" href="" role="button">Đăng nhập Netflix</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img class="card-img" src="images/phim2.jpg" alt="First slide" />
                                </div>

                                <div class="col-lg-6">
                                    <div class="jumbotron text-header
                                            item-films">
                                        <h1 class="display-3 text-light
                                                h1-items">
                                            Peaky Blinder
                                        </h1>
                                        <p class="lead text-light mt-3
                                                p1-items">
                                            Băng đảng khét tiếng thành London. Chi phối nước Anh.
                                        </p>
                                        <a class="btn btn-danger" href="" role="button">Đăng nhập Netflix</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img class="card-img" src="images/phim3.webp" alt="First slide" />
                                </div>

                                <div class="col-lg-6">
                                    <div class="jumbotron text-header
                                            item-films">
                                        <h1 class="display-3 text-light
                                                h1-items">
                                            Lorange is the new black
                                        </h1>
                                        <p class="lead text-light mt-3
                                                p1-items">
                                            Một nhóm tù nhân bất trị trong nhà tù nữ. Bom tấn phim vượt ngục.
                                        </p>
                                        <a class="btn btn-danger" href="" role="button">Đăng nhập Netflix</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img class="card-img" src="images/phim4.webp" alt="First slide" />
                                </div>

                                <div class="col-lg-6">
                                    <div class="jumbotron text-header
                                            item-films">
                                        <h1 class="display-3 text-light
                                                h1-items">
                                            The Witcher
                                        </h1>
                                        <p class="lead text-light mt-3
                                                p1-items">
                                            Chàng thợ săn phù thủy The Witcher. Cùng cuộc phiêu lưu vô cùng nguy hiểm.
                                        </p>
                                        <a class="btn btn-danger" href="" role="button">Đăng nhập Netflix</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img class="card-img" src="images/phim5.jpg" alt="First slide" />
                                </div>

                                <div class="col-lg-6">
                                    <div class="jumbotron text-header
                                            item-films">
                                        <h1 class="display-3 text-light
                                                h1-items">ARCANE</h1>
                                        <p class="lead text-light mt-3
                                                p1-items">
                                            Cuộc sống đầy bất cốc của người dân Zaun trái ngược với sự thịnh vượng của Piltover.
                                        </p>
                                        <a class="btn btn-danger" href="" role="button">Đăng nhập Netflix</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- info4  -->
<div class="info">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 box-info2 position-relative">
                    <img class="card-img-top" src="images/info-img4.png" alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="jumbotron text-header">
                    <h1 class="display-3 text-light h1-info1">
                        Tạo hồ sơ cho trẻ em.
                    </h1>
                    <p class="lead text-light mt-3 p1-header">
                        Đưa các em vào những cuộc phiêu lưu với nhân vật được yêu thích trong một không gian riêng. Tính năng này đi kèm miễn phí với tư cách thành viên của bạn.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- info5  -->
<div class="info">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="jumbotron text-header">
                    <h1 class="display-3 text-light h1-info1">
                        Bạn có điện thoại Android? Hãy thử gói dịch vụ miễn phí mới của chúng tôi!
                    </h1>
                    <p class="lead text-light mt-3 p1-header">
                        Xem các bộ phim và chương trình truyền hình mới được tuyển chọn mà không cần cung cấp thông tin thanh toán!
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 box-info2 position-relative">
                    <img class="card-img-top" src="images/info-img-5.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- info6 -->
<div class="info">
    <div class="container question">
        <div class="text-question">
            <div class="h1-info1 text-center text-light">Câu hỏi thường gặp
            </div>
        </div>
        <div class="dropdown open box-dropdown">
            <button class="btn btn-secondary dropdown-toggle text-left
                    drop-box" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="d-inline">Netflix là gì?</p>
            </button>
            <div class="dropdown-menu answer" aria-labelledby="triggerId">
                <p>
                    Netflix là dịch vụ phát trực tuyến mang đến đa dạng các loại chương trình truyền hình, phim, anime, phim tài liệu đoạt giải thưởng và nhiều nội dung khác trên hàng nghìn thiết bị có kết nối Internet. Bạn có thể xem bao nhiêu tùy thích, bất cứ lúc nào
                    bạn muốn mà không gặp phải một quảng cáo nào – tất cả chỉ với một mức giá thấp hàng tháng. Luôn có những nội dung mới để bạn khám phá và những chương trình truyền hình, phim mới được bổ sung mỗi tuần!
                </p>
            </div>
        </div>
        <div class="dropdown open box-dropdown">
            <button class="btn btn-secondary dropdown-toggle text-left
                    drop-box" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="d-inline">Tôi phải trả bao tiền để xem
                    Netflix?</p>
            </button>
            <div class="dropdown-menu answer" aria-labelledby="triggerId">
                <p>
                    Xem Netflix trên điện thoại thông minh, máy tính bảng, TV thông minh, máy tính xách tay hoặc thiết bị phát trực tuyến, chỉ với một khoản phí cố định hàng tháng. Các gói dịch vụ với mức giá từ 70.000 ₫ đến 260.000 ₫ mỗi tháng. Không phụ phí, không hợp
                    đồng.
                </p>
            </div>
        </div>
        <div class="dropdown open box-dropdown">
            <button class="btn btn-secondary dropdown-toggle text-left
                    drop-box" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="d-inline">Tôi có thể xem ở đâu</p>
            </button>
            <div class="dropdown-menu answer" aria-labelledby="triggerId">
                <p>
                    Xem mọi lúc, mọi nơi. Đăng nhập bằng tài khoản Netflix của bạn để xem ngay trên trang web netflix.com từ máy tính cá nhân, hoặc trên bất kỳ thiết bị nào có kết nối Internet và có cài đặt ứng dụng Netflix, bao gồm TV thông minh, điện thoại thông minh,
                    máy tính bảng, thiết bị phát đa phương tiện trực tuyến và máy chơi game. Bạn cũng có thể tải xuống các chương trình yêu thích bằng ứng dụng trên iOS, Android hoặc Windows 10. Vào phần nội dung đã tải xuống để xem trong khi di chuyển
                    và khi không có kết nối Internet. Mang Netflix theo bạn đến mọi nơi.
                </p>
            </div>
        </div>
        <div class="dropdown open box-dropdown">
            <button class="btn btn-secondary dropdown-toggle text-left
                    drop-box" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="d-inline">Làm thế nào để hủy</p>
            </button>
            <div class="dropdown-menu answer" aria-labelledby="triggerId">
                <p>
                    Netflix rất linh hoạt. Không có hợp đồng phiền toái, không ràng buộc. Bạn có thể dễ dàng hủy tài khoản trực tuyến chỉ trong hai cú nhấp chuột. Không mất phí hủy – bạn có thể bắt đầu hoặc ngừng tài khoản bất cứ lúc nào.
                </p>
            </div>
        </div>
        <div class="dropdown open box-dropdown">
            <button class="btn btn-secondary dropdown-toggle text-left
                    drop-box" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="d-inline">Tôi có thể xem gì trên Netflix</p>
            </button>
            <div class="dropdown-menu answer" aria-labelledby="triggerId">
                <p>
                    Netflix có một thư viện phong phú gồm các phim truyện, phim tài liệu, chương trình truyền hình, anime, tác phẩm giành giải thưởng của Netflix và nhiều nội dung khác. Xem không giới hạn bất cứ lúc nào bạn muốn.
                </p>
            </div>
        </div>
        <div class="dropdown open box-dropdown">
            <button class="btn btn-secondary dropdown-toggle text-left
                    drop-box" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="d-inline">Netflix có phù hợp cho trẻ em không?</p>
            </button>
            <div class="dropdown-menu answer" aria-labelledby="triggerId">
                <p>
                    Trải nghiệm Netflix Trẻ em có sẵn trong gói dịch vụ của bạn, trao cho phụ huynh quyền kiểm soát trong khi các em có thể thưởng thức các bộ phim và chương trình phù hợp cho gia đình tại không gian riêng. Hồ sơ Trẻ em đi kèm tính năng kiểm soát của cha
                    mẹ (được bảo vệ bằng mã PIN), cho phép bạn giới hạn độ tuổi cho nội dung con mình được phép xem, cũng như chặn những phim hoặc chương trình mà bạn không muốn các em nhìn thấy.
                </p>
            </div>
        </div>
    </div>
    <div class="email-login-2 mx-auto">
                <a type="button" href="{{route('account.create')}}" class="btn btn-lg btn-block button-email text-light mx-auto">
                    Bắt đầu <i class="fa-solid fa-arrow-right"></i>
                </a>
    </div>
</div>
<!-- end main  -->
<footer>
    <div class="container">
        <h4 class="text-secondary pb-3">
            Bạn có câu hỏi? Liên hệ với chúng tôi.
        </h4>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Câu hỏi thường gặp</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Quan hệ với nhà đầu
                            tư</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Quyền riêng tư</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Kiểm tra tốc độ</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Trung tâm trợ giúp</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Việc làm</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Tùy chọn cookie</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Thông báo pháp lý</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Tài khoản</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Các cách xem</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Thông tin doanh
                            nghiệp</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Chỉ có trên
                            Netflix</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Trung tâm đa phương
                            tiện</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Điều khoản sử dụng</a>
                        <a href="#" class="text-secondary d-inline-block pt-2" style="width: 100%">Liên hệ với chúng
                            tôi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown open mr-md-4 mt-5">
            <button class="btn btn-secondary dropdown-toggle language" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-globe"></i><span class="d-none
                        d-md-inline d-sm-none"> Tiếng Việt</span>
            </button>
            <div class="dropdown-menu language-items bg-secondary" style="width: 135px" aria-labelledby="triggerId">
                <button class="dropdown-item text-light" href="#">English</button>
            </div>
        </div>
        <p class="text-secondary mt-3">Netflix việt nam</p>
    </div>

</footer>
@endsection