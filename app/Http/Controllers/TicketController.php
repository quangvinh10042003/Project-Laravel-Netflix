<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($film_id)
    {
        if(Gate::any(['admin','timeManager'], Auth::user())){
            $timeline = Timeline::orderBy('id','desc')->first();
            $formData = [];
            for($i=1; $i <= 50; $i++ ){
            $formData['status'] = 1;
            $formData['film_id'] = $film_id;
            $formData['timeline_id'] = $timeline['id'];
            $formData['number'] = $i;
            Ticket::create($formData);
            }
            return redirect()->route('timeline.show',$film_id);
        }   
        else{
            return abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
