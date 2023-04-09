<?php

namespace App\Http\Controllers;
use App\Models\Release_date;
use App\Models\Timeline;
use App\Models\Ticket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
class Release_dateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::any(['admin','timeManager'], Auth::user())){
            $list = Release_date::all();
            return view('admin.releaseDate',compact('list'));
        }else{
            return abort(403);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::any(['admin','timeManager'], Auth::user())){
            $today =  strtotime(date("Y-m-d"));
            $allRd = Release_date::all();
            foreach($allRd as $value){
                if(strtotime($value->release_date) < $today){
                    $timelines = Timeline::isTimelineQueryByDateId($value->id)->get();
                    foreach($timelines as $time){
                        Ticket::isTicketQueryByTimelineId($time->id)->delete();
                        Order::where('timeline_id', $time->id)->delete();
                    }
                    Timeline::isTimelineQueryByDateId($value->id)->delete();
                    $value->delete();
                }
            }
            return redirect()->back()->with('yes','Đã xóa những ngày cũ');
        }else{
            return abort(403);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $allRd = Release_date::orderBy('id','desc')->first();
       
        if($allRd){
            $nextday = date('Y-m-d',strtotime($allRd->release_date) + (24*60*60));
            $formDate = $request->all('release_date');
            $formDate['release_date'] = $nextday;
            Release_date::create($formDate);
        }else{
            $today = strtotime(date('Y-m-d'));
            $nextday = date('Y-m-d',$today);
            $formDate = $request->all('release_date');
            $formDate['release_date'] = $nextday;
            Release_date::create($formDate);
        }
        return redirect()->back()->with('yes','Đã thêm ngày tiếp theo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $formData = $request->all('release_date');
        try {
            Release_date::create($formData);
            return redirect()->back()->with('yes','Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Thêm mới không thành công');
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release_date $release_date)
    {   
        $listTimeline = Timeline::isTimelineQueryByDateId($release_date->id)->get();
        foreach($listTimeline as $value){
            Ticket::isTicketQueryByTimelineId($value->id)->delete();
            Order::where('timeline_id', $value->id)->delete();
        }
        Timeline::isTimelineQueryByDateId($release_date->id)->delete();
        try {
           
            $release_date->delete();
            return redirect()->back()->with('yes','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Xóa không thành công');
        }
    }
}
