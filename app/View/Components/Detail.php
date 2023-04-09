<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Detail extends Component
{
    public $film;
    public $release_dates;
    public $timelines;
    public $idDate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($film, $releaseDates, $timelines, $idDate)
    {
        $this->film = $film;
        $this->release_dates = $releaseDates;
        $this->timelines = $timelines;
        $this->idDate = $idDate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $film = $this->film;
        $release_dates = $this->release_dates;
        $timelines = $this->timelines;
        $idDate = $this->idDate;
        if(!empty($idDate)){
            return view('components.detail',compact('film','release_dates','timelines','idDate'));
        }else{
            return view('components.detail',compact('film','release_dates','timelines'));
        }
        
    }
}
