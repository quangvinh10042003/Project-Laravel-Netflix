@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{url('')}}/style/detail.css">
@endsection
@section('main')
    <x-detail :film="$film" :releaseDates="$release_dates"  :timelines="$timelines" :idDate="$idDate" />
    <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 cinema modalBg">
                    <div class="head">
                        <h4 class="text-center mb-5 screen">Màn hình <i class="fa-solid fa-film"></i></h4>
                    </div>
                    <div class="d-flex boxTicket">
                      
                        @foreach ($tickets as $key => $ticket)
                        <div class="ticketChair mb-3 text-center">
                            @if($ticket->status == 1)
                            <label onclick="getCourch({{$key}})" class="position-relative" id="iconCourch{{$key}}"><i class="fa-solid fa-couch"></i>
                                <div class="numChair">{{$ticket->number}}</div>
                            </label>
                            <input type="text" id="number{{$key}}" value="{{$ticket->number}}" hidden>
                            @else
                            <label class="chairChoosen position-relative" >
                                <i class="fa-solid fa-couch"></i>
                                <div class="numChair">{{$ticket->number}}</div>
                            </label>
                            @endif
                        </div>
                        @endforeach
                    </div>
                
                    <div class="row justify-content-arround">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-couch"></i>
                            <span>Ghế trống</span>
                        </div>
                        <div class="col-4  text-center">
                            <i class="fa-solid fa-couch chairChoosen"></i>
                            <span>Hết ghế</span>
                        </div>
                        <div class="col-4  text-center">
                            <i class="fa-solid fa-couch chairChoose"></i>
                            <span>Ghế bạn chọn</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="checkout">
                        <h3 class="text-center bill">Hóa Đơn</h3>
                        <p>Tên phim: <b>{{$film->name}}</b></p>
                        <p>Thời gian: <br><b>{{date("d/m/Y H:i",strtotime($thisTimeline->timeline))}}<br></b></p>
                        <p>Ghế số: <b id="locationChair"></b></p>
                        <p>Số lượng vé: <b id="total">0</b></p>
                        <p>Thành tiền: <b id="subtotal">0</b></p>
                        <form action="{{route('home.getTicket')}}" method="POST">
                            @csrf @method('put')
                            <input type="text" id="lastArray" hidden name="arr">
                            <input type="text" name="film_id" hidden value="{{$film->id}}">
                            <input type="text" name="timeline_id" hidden value="{{$idTimeline}}">
                            <button type="submit" class="btn btn-danger mt-5 d-block px-5 mx-auto">Đặt Vé</button>
                        </form>
                    </div>
                </div>
            </div>
        
    </div>
    
@endsection
@section('script')
<script>
    var arrNumber = [];
    
    function getCourch(key) {
        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });

        var subtotal = 0;
        var total = 0;
        var allChair = '';
        let check = true;
        var number = document.getElementById(`number${key}`).value;
        if (arrNumber.length >= 1) {
            for (let i = 0; i < arrNumber.length; i++) {
                if (arrNumber[i] == number) {
                    if (arrNumber.length == 1) {
                        arrNumber = [];
                        check = false;
                    }else {
                        arrNumber.splice(i, 1);
                        check = false; 
                    }
                }
            }
            if (check) {
                arrNumber.push(number);
            }
        } else {
            arrNumber.push(number);
        }
        let copyArr = arrNumber;
        copyArr.sort(function(a, b){return a - b});
        for(let i=0; i < copyArr.length  ;i++){
            total += 1;
            if(copyArr.length - i == 1 ){
                allChair += `${copyArr[i]}`;
            }else{
                allChair += `${copyArr[i]}, `;
            }
        }
        subtotal = total*100000;
        var json = JSON.stringify(arrNumber);
        document.getElementById('lastArray').value = json;
        document.getElementById('locationChair').innerHTML = allChair;
        document.getElementById('subtotal').innerHTML = VND.format(subtotal);
        document.getElementById('total').innerHTML = total;
        document.getElementById(`iconCourch${key}`).classList.toggle('chairChoose');
    }
</script>