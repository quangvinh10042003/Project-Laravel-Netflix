<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['timeline_id','number','film_id','status'];
    public function films(){
        return $this->hasOne(Film::class, 'id','film_id');
    }
    public function timelines(){
        return $this->hasOne(Timeline::class, 'id','timeline_id');
    }
    public function scopeIsTicketQueryByTimelineId($query, $id){
        $result = $query->where('timeline_id',$id);
        return $result;
    }
    
    public function scopeIsTicketQueryByFilmTimelineId($query, $film_id, $time_id ){
        $result = $query->where([
            ['film_id','=',$film_id],
            ['timeline_id','=',$time_id]
        ]);
        return $result;
    }
    public function scopeIsTicketQueryByPrimaryKey($query, $film_id, $time_id, $number){
        $result = $query->where([
            ['film_id','=',$film_id],
            ['timeline_id','=',$time_id],
            ['number','=',$number]
        ]);
        return $result;
    }
}
