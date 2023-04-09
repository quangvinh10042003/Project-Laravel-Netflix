<?php

namespace App\Http\Controllers;
use App\Models\Timeline;
use App\Models\Film;
use App\Models\Ticket;
use App\Models\Release_date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth('acc')->user();
        dd($auth);
        return view('profile', compact('auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $formDate = $request->all('film_id','release_id');
            $date = $request->all('timeline','rd');
            $formDate['timeline'] = $date['rd'].' '.$date['timeline'];
            try {
                Timeline::create($formDate);
                // dd($formDate);
                return redirect()->route('ticket.show',$formDate['film_id'])->with('yes','Thêm mới thời gian chiếu thành công');
            } catch (\Throwable $th) {
                return redirect()->back()->with('no','Thời gian bị trùng');
            }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($film_id)
    {
        // if(Gate::any(['admin,timeManager'], Auth::user())){

        // }else{
        //     return abort(403);
        // }
      
         if(Gate::any(['admin','timeManager'], Auth::user())){
            $film = Film::isFilmQueryById($film_id)->first();
            $listTimelines = Timeline::isTimelineQueryByFilmId($film_id)->get();
            $rdList = Release_date::all();
            return view('admin.infoFilm',compact('listTimelines','film','rdList'));
        }else{
            return abort(403);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timeline $timeline)
    {
        $formData = $request->all('timeline','film_id');
        $date = $request->all('release');
        $formData['timeline'] = $date['release'].' '.$formData['timeline'].':00';
       
        try {
            $timeline->update($formData);
            return redirect()->back()->with('yes','Cập nhật thời gian thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Cập nhật thời gian không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeline $timeline)
    {
        try {
            Ticket::isTicketQueryByTimelineId($timeline->id)->delete();
            $timeline->delete();
            return redirect()->back()->with('yes','Xóa thời gian thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Xóa thời gian không thành công');
        }
    }
}   