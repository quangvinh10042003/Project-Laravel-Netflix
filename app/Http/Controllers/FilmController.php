<?php

namespace App\Http\Controllers;
use App\Models\Film;
use App\Models\Ticket;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
class FilmController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::any(['admin','productManager'], Auth::user())){
            return view('admin.addFilm');
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
        $formData = $request->only('name','category','actor','content','producer','time');
        $file_name = $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'),$file_name);
        $formData['image'] = $file_name;
        try {
            Film::create($formData);
            return redirect()->route('admin.films')->with('yes','Thêm mới phim thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Thêm mới phim không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        if(Gate::any(['admin','productManager'], Auth::user())){
            return view('admin.editFilm',compact('film'));
        }else{
            return abort(403);
        }
        return view('admin.editFilm',compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Film $film)
    {
        $formData = $request->only('name','category','actor','content','producer','time');
        if ($request->has('image')) {
            $file_name = $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name);
            $formData['image'] = $file_name;
        }
        try {
            $film->update($formData);
            return redirect()->route('admin.films')->with('yes','Cập nhật phim thành công');
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Cập nhật phim không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy(Film $film)
    {
        $timelines = Timeline::isTimelineQueryByFilmId($film->id)->get();
        foreach($timelines as $value){
            Ticket::isTicketQueryByFilmTimelineId($film->id,$value->id)->delete();
            Timeline::isTimelineQueryByFilmId($film->id)->delete();
        }
        try {
            $film->delete();
            return redirect()->route('admin.films')->with('yes','Xóa phim thành công');
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Xóa phim không thành công');
        }
    }
}
