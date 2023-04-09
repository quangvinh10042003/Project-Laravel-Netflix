<main class="container">
    <div class="row">
        <div class="col-md-5 item-films">
            <div class="card">
                <img class="card-img-top card-films" src="{{url('')}}/images/{{$film->image}}" alt="">
            </div>
        </div>
        <div class="col-md-7 item-films">
            <h2 class="text-light">{{$film->name}}</h2>
            <p class="text-secondary"><span class="mr-3"><b>Thể loại</b>: {{$film->category}}</p>
            <p class="mt-2 text-light"><span class="font-weight-bold border-bottom border-danger text-danger">Mô tả:</span> {{$film->content}}</p>
            <table class="mt-4" cellpadding="7">
                <tr>
                    <td class="text-secondary">Diễn viên:</td>
                    <td class="text-light pl-3">{{$film->actor}}</td>
                </tr>
                <tr>
                    <td class="text-secondary">Nhà sản xuất:</td>
                    <td class="text-light pl-3">{{$film->producer}}</td>
                </tr>
            </table>
            <div class="releaseDate mt-4 pb-3">
                <h4 class="text-light mt-4">Release Date</h4>
                <div class="row pt-4">
                    @foreach ($release_dates as $key => $date)
                    <div class="col-lg-3 col-md-4 col-6 pt-2">
                       
                        <a class="date {{ ( $idDate == $date->id ) ? 'active' : '' }}" href="{{linkDetailDate($film, $date)}}" role="button">{{date("d/m/Y",strtotime($date->release_date))}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="timeline mt-2 py-3 row">
                @foreach ($timelines as $key => $time)
                <div class="col-lg-2 col-3 mb-3">
                    <a href="{{linkDetailTimeline($film,$time->release_dates,$time)}}" type="button" class="btn time">{{date("H:i",strtotime($time->timeline))}}</a>
                </div>   
                @endforeach 
            </div>
        </div>
    </div>
</main>
